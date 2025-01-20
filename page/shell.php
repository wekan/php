<?php

function queryMongoUser() {
    // Set environment variables
    $env = array(
        'LD_LIBRARY_PATH' => getenv('LD_LIBRARY_PATH') . ':/snap/wekan/current/lib/x86_64-linux-gnu',
        'PATH' => '/snap/wekan/current/bin:' . getenv('PATH')
    );

    // MongoDB shell command to select one user
    $command = 'mongo --host localhost --port 27017 --quiet --eval "db.users.findOne()" wekan';

    // Execute command with environment settings
    $descriptorspec = array(
        1 => array('pipe', 'w'), // stdout
        2 => array('pipe', 'w')  // stderr
    );
    
    $process = proc_open($command, $descriptorspec, $pipes, null, $env);
    
    if (is_resource($process)) {
        $output = stream_get_contents($pipes[1]);
        $error = stream_get_contents($pipes[2]);
        
        fclose($pipes[1]);
        fclose($pipes[2]);
        proc_close($process);
        
        if ($error) {
            throw new Exception("MongoDB shell error: " . $error);
        }
        
        // Parse JSON output to PHP array
        return json_decode($output, true);
    }
    
    return null;
}

// Usage example:
try {
    $user = queryMongoUser();
    if ($user) {
        print_r($user);
    }
} catch (Exception $e) {
    error_log($e->getMessage());
}
