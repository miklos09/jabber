(function($) 
{
 
    /* get key code */
    function getKeyCode(key)
    {
        //return the key code
        return (key == null) ? event.keyCode : key.keyCode;
    }
     
    /* get key character */
    function getKey(key)
    {
        //return the key
        return String.fromCharCode(getKeyCode(key)).toLowerCase();
    }
 
    $(document).ready(function()
    {
        $(document).keydown(function (eventObj)
        {
            /* display the key and character code for the key you pressed */
            alert("Key pressed: "+getKey(eventObj)+ " Code = "+getKeyCode(eventObj));
        });
    });
     
})(jQuery);