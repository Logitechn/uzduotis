<script type="text/javascript" src="javascript/iconselect.js"></script>
<script type="text/javascript" src="javascript/iscroll.js"></script>
<script type="text/javascript">
            
        var iconSelect;
        var selectedText;

        window.onload = function(){
            
            selectedText = document.getElementById('selected-text');
            
            document.getElementById('my-icon-select').addEventListener('changed', function(e){
               selectedText.value = iconSelect.getSelectedValue();
            });
            
            iconSelect = new IconSelect("my-icon-select");

            var icons = [];
            icons.push({'iconFilePath':'image/1.png', 'iconValue':'1'});
            icons.push({'iconFilePath':'image/2.png', 'iconValue':'2'});
            icons.push({'iconFilePath':'image/3.png', 'iconValue':'3'});
            icons.push({'iconFilePath':'image/4.png', 'iconValue':'4'});
            icons.push({'iconFilePath':'image/5.png', 'iconValue':'5'});
            icons.push({'iconFilePath':'image/6.png', 'iconValue':'6'});
            icons.push({'iconFilePath':'image/7.png', 'iconValue':'7'});
            icons.push({'iconFilePath':'image/8.png', 'iconValue':'8'});
            icons.push({'iconFilePath':'image/9.png', 'iconValue':'9'});
            icons.push({'iconFilePath':'image/10.png', 'iconValue':'10'});
            icons.push({'iconFilePath':'image/11.png', 'iconValue':'11'});
            
            iconSelect.refresh(icons);
        };
            
</script>