<?php

/*
=========== ALL BOARDS START ===========
*/

if ($page == "allboards") {

?>

    <div class="navigation">
        <div style="float: left; text-align: left;">
            <img src="logo-header.png" alt="">
            <span class="allBoards"><a href="/"><img src="img/home.png"><?php translate("all-boards"); ?></a></span>
            <span class="current empty">Star a board to add a shortcut in this bar.</span>
        </div>
        <div style="float: right; text-align: right;">
            <span><a class="notifications-drawer-toggle fa fa-bell" href="#">Notifications</a></span>
            <span><?php echo $_SESSION["user"]; ?></span>
        </div>
    </div>
    <div style="position:absolute; top: 50px;">
            <h1><?php translate("my-boards"); ?></h1>

 <div style="text-align: center; min-height: 100px; border: 1px solid black; padding: 2px; border-radius: 10px 10px 10px 10px;"><br /><br /><?php translate("add-board"); ?></a></div>

 <div style="min-height: 100px; border: 1px solid black; padding: 2px; border-radius: 10px 10px 10px 10px;">hep hei<br>joojojoj jodsjfdo fjsodf fjdos<br>jijdijgsidji<br>okfodskfso</div>

 <div class="minicard">hep hei<br>joojojoj jodsjfdo fjsodf fjdos<br>jijdijgsidji<br>okfodskfso</div>

</div>
<div class="dates">
<div class="date"><a class="js-edit-date card-date start-date current" title="Alkaa tiistai, 7. tammikuuta 2020, klo 09.00" href="#" aria-label="Alkaa tiistai, 7. tammikuuta 2020, klo 09.00"><time datetime="2020-01-07T07:00:00.000Z">7.1.2020</time></a></div>
<div class="date"><a class="js-edit-date card-date due-date long-overdue" title="Erääntyy torstai, 30. tammikuuta 2020, klo 15.00" href="#" aria-label="Erääntyy torstai, 30. tammikuuta 2020, klo 15.00"><time datetime="2020-01-30T13:00:00.000Z">30.1.2020</time></a></div>

<div class="date"><a class="js-edit-time card-time card-label-green" title="Käytetty aika 3 tuntia" href="#" aria-label="Käytetty aika 3 tuntia">3</a></div></div>
<div class="minicard-custom-fields"></div>



<div class="badges">
<div class="badge badge-state-image-only" title="Testing checklists etc with Wekan, The Open Source Trello-like kanban https://wekan.github.io"><span class="badge-icon fa fa-align-left"></span></div>
<div class="badge badge-state-image-only" title="Cool?"><span class="badge-icon fa fa-thumbs-up text-green"></span>
<span class="badge-text">1</span>
<span class="badge-icon fa fa-thumbs-down"></span>
<span class="badge-text">0</span></div>
<div class="badge badge-state-image-only" title="true"><span class="badge-icon fa fa-check text-green"></span>
</div>
<div class="badge"><span class="badge-icon fa fa-paperclip"></span>
<span class="badge-text">1</span></div>
<div class="badge"><span class="badge-icon fa fa-check-square-o"></span>
<span class="badge-text check-list-text">1/3</span></div>

</div></div></a>

<a class="open-minicard-composer js-card-composer js-open-inlined-form" title="Lisää kortti listan loppuun" href="#" aria-label="Lisää kortti listan loppuun"><i class="fa fa-plus"></i></a></div>



<script>
function allowDrop(ev) {ev.preventDefault();}
function drag(ev) {ev.dataTransfer.setData("text/html", ev.target.id);}
function drop(ev) {
ev.preventDefault();
var data = ev.dataTransfer.getData("text/html");
ev.target.appendChild(document.getElementById(data));
}
</script>
<p>Drag the javatpoint image into the rectangle:</p>
<div id="div1" style="width:350px;height:100px;padding:10px;border:1px solid #aaaaaa;"
ondrop="drop(event)" ondragover="allowDrop(event)" droppable="true"></div>
<br>
<img id="drag1" src="Square44x44Logo.scale-100.png" alt="javatpoint image"
draggable="true" ondragstart="drag(event)"/>

<?php

}

/*
=========== ALL BOARDS END ===========
*/

?>
