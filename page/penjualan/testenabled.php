<html>
<input type="submit" id="button1" onclick="toEnable()" value="Button1">
<input type="submit" disabled id="button2" value="Button2" >

<script type="text/javascript">

function toEnable(){
  
    document.getElementById("button1").disabled = true;
    document.getElementById("button2").disabled = false;
}
</script>
</html>

