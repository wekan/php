<table style="border-collapse: collapse;"
width="240" height="190" border="0" padding="0" spacing="0" id="drag-1" class="draggable"
border-collapse="collapse" background="img/round-blue.gif">
  <tr border="0" padding="0" spacing="0">
    <td width="20" height="20"></td>
    <td width="200" height="80" vAlign="middle" align="top">
      <font size="3" color="#FFFFFF" face="arial"><p>At touchscreen, you can drag many cards at once</p></font>
    </td>
    <td width="20" height="20"></td>
  </tr>
  <tr border="0" padding="0" spacing="0">
    <td width="20" height="20"></td>
    <td width="200" height="20"></td>
    <td width="20" height="20"></td>
  </tr>
  <tr border="0" padding="0" spacing="0">
    <td width="20" height="20"></td>
    <td width="200" height="20"></td>
    <td width="20" height="20"></td>
  </tr>
</table>

<br />

<table style="border-collapse: collapse;"
width="240" height="190" border="0" padding="0" spacing="0" id="drag-2" class="draggable"
border-collapse="collapse" background="img/round-blue.gif">
  <tr border="0" padding="0" spacing="0">
    <td width="20" height="20"></td>
    <td width="200" height="80" vAlign="middle" align="top">
      <font size="3" color="#FFFFFF" face="arial"><p>one with each finger, multiuser</p></font>
    </td>
    <td width="20" height="20"></td>
  </tr>
  <tr border="0" padding="0" spacing="0">
    <td width="20" height="20"></td>
    <td width="200" height="20"></td>
    <td width="20" height="20"></td>
  </tr>
  <tr border="0" padding="0" spacing="0">
    <td width="20" height="20"></td>
    <td width="200" height="20"></td>
    <td width="20" height="20"></td>
  </tr>
</table>

<script type="text/javascript">
    // target elements with the "draggable" class
    interact('.draggable')
      .draggable({
        // enable inertial throwing
        inertia: true,
        // keep the element within the area of it's parent
        modifiers: [
          interact.modifiers.restrictRect({
            restriction: 'parent',
            endOnly: true
          })
        ],
        // enable autoScroll
        autoScroll: true,
    
        listeners: {
          // call this function on every dragmove event
          move: dragMoveListener,
    
          // call this function on every dragend event
          end (event) {
            var textEl = event.target.querySelector('p')
    
            textEl && (textEl.textContent =
              'moved a distance of ' +
              (Math.sqrt(Math.pow(event.pageX - event.x0, 2) +
                         Math.pow(event.pageY - event.y0, 2) | 0))
                .toFixed(2) + 'px')
          }
        }
      })
    
    function dragMoveListener (event) {
      var target = event.target
      // keep the dragged position in the data-x/data-y attributes
      var x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx
      var y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy
    
      // translate the element
      target.style.transform = 'translate(' + x + 'px, ' + y + 'px)'
    
      // update the posiion attributes
      target.setAttribute('data-x', x)
      target.setAttribute('data-y', y)
    }
    
    // this function is used later in the resizing and gesture demos
    window.dragMoveListener = dragMoveListener    
</script>
