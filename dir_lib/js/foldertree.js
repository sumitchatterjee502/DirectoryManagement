$(function () {

    // window.onclick = hideContextMenu;
    window.onkeydown = listenKeys;

    $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
   // $('li.parent_li').find(' > ul > li').css({'display':'none'});
    $('.tree li.parent_li > span').on('click', function () {
        var children = $(this).parent('li.parent_li').find(' > ul > li');
        if (children.is(":hidden")) {
            children.show('fast');
            $(this).attr('title', 'Collapse this branch').find(' > a > i').addClass('fa fa-angle-double-down').removeClass('fas fa-angle-right');
            
        } else {
            children.hide('fast');
            $(this).attr('title', 'Expand this branch').find(' > a > i').addClass('fas fa-angle-right').removeClass('fa fa-angle-double-down');
            
        }
        //e.stopPropagation();
    });

    /*===========================Delete File======================*/
    $('.createFile').on('click','.fileDeleteButton',function(){

        var DeleteFile = $(this).val();
        //console.log(DeleteFile);
        $('#DeleteFile').val(DeleteFile);
    })

    $('#mainDir').on('click',function(){

        var mainDir = $(this).val();
        //console.log(DeleteFile);
        $('#createFolder').val(mainDir);
    });

    $('#mainDirFile').on('click',function(){

        var mainDirFile = $(this).val();
        //console.log(DeleteFile);
        $('#createFile').val(mainDirFile);
    })

    /*----------- create context menu ==============================*/
    $('.createDir').on('contextmenu',function(e){
        e.stopPropagation();
        var modelF = $(this).find('.context-menu ul li .menuButton').val();
        var modelFile = $(this).find('.context-menu ul li .menuFileButton').val();
        var DeleteFolder = $(this).find('.context-menu ul li .menuDeleteButton').val();
        
        $('#modelF').text('Folder Location : "'+modelF+'"');

        $('#modelFile').text('Folder Location : "'+modelFile+'"');

        $('#createFolder').val(modelF);

        $('#createFile').val(modelFile);

        $('#DeleteFolder').val(DeleteFolder);

        

        $(this).find('.context-menu').css({
          display: "block",
          left: e.pageX,
          top: e.pageY
        });
        $(this).children().find('.context-menu').css({
          display: "none"
        });
        return false;

    })
   
   
    $("html").click(function() {
      $(this).find('.context-menu').css({
          display: "none"
        });
    });


    function listenKeys(event){
        var keyCode = event.which || event.keyCode;
        if(keyCode === 27){
            hideContextMenu();
        }
    }

    $('[data-toggle="tooltip"]').tooltip()
});