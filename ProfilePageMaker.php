<?php
/*
Plugin Name: ProfilePageMaker
Plugin URI: http://www.example.com/plugin
Description: Introducing your profile on the page with motion
Author: KunishimaAtsushi
Version: 0.1
Author URI: http://www.example.com
*/
class ProfilePageMaker {
  function __construct() {
    add_action('admin_menu', array($this, 'add_pages'));
  }
  function add_pages() {
    add_menu_page('ProfilePageMaker','ProfilePageMaker',  'level_8', __FILE__, array($this,'show_text_option_page'), '', 26);
  }
  function show_text_option_page() {
    if ( isset($_POST['img_options'])) {
        check_admin_referer('shoptions');
        $opt = $_POST['img_options'];
        update_option('img_options', $opt);
        ?>
        <div class="updated fade"><p><strong><?php _e('Options saved.'); ?></strong></p></div>
        <?php
    }
    ?>
    <div class="wrap">
    <div id="icon-options-general" class="icon32"><br /></div><h2>ProfilePageMaker</h2>
        <form action="" method="post">
            <?php
            wp_nonce_field('shoptions');
            $opt = get_option('img_options');
            $show_img1 = isset($opt['img1']) ? $opt['img1']: null;
            $show_img2 = isset($opt['img2']) ? $opt['img2']: null;
            $show_img3 = isset($opt['img3']) ? $opt['img3']: null;
            $show_img4 = isset($opt['img4']) ? $opt['img4']: null;
            $show_img5 = isset($opt['img5']) ? $opt['img5']: null;
            $show_img6 = isset($opt['img6']) ? $opt['img6']: null;
            $show_left = isset($opt['left']) ? $opt['left']: null;
            $show_right = isset($opt['right']) ? $opt['right']: null;
            $show_sum = isset($opt['right']) ? $show_right+$show_left: null;
            $show_profile = isset($opt['profile']) ? $opt['profile']: null;
            $show_Career = isset($opt['Career']) ? $opt['Career']: null;
            ?>
            <hr />
            <div style="width: 100%; text-align: left; margin: 0 auto;">
              <div style="margin: 0 10px;">
                <div style="width:40%; float:left;">
                <!--メインスペース-->
                  <div style=" text-align:center;margin-top:30px;margin-left:30px;">
                  <table border="3">
                  <tr><td colspan="3" id="tdbigimg" >■</td><td colspan="3" id="tdpro">■</td></tr>
                  <tr><td id="tdimg1">■</td><td id="tdimg2">■</td><td id="tdimg3">■</td><td id="tdimg4">■</td><td id="tdimg5">■</td><td id="tdimg6">■</td></tr>
                  <tr><td id="tdcarr" colspan="6">■</td></tr>
                  </table>
                </div><p>Width input[left:right]</p>
                  <p><input id="inputtext9" name="img_options[left]" type="text" style='width:20%;' value="<?php  echo $show_left ?>" />
                  ：<input id="inputtext10" name="img_options[right]" type="text" style='width:20%;' value="<?php  echo $show_right ?>" /></p>
<p class="submit"><input type="submit" name="Submit" class="button-primary" value="value save" /></p>
                </div>
                <div style="width:60%; float: right;">
                <!--サイドバー-->
                  <p>image1:<input name="img_options[img1]" type="text" id="inputtext1" value="<?php  echo $show_img1 ?>" style='width:90%;' /></p>
                  <p>image2:<input name="img_options[img2]" type="text" id="inputtext2" value="<?php  echo $show_img2 ?>" style='width:90%;' /></p>
                  <p>image3:<input name="img_options[img3]" type="text" id="inputtext3" value="<?php  echo $show_img3 ?>" style='width:90%;' /></p>
                  <p>image4:<input name="img_options[img4]" type="text" id="inputtext4" value="<?php  echo $show_img4 ?>" style='width:90%;' /></p>
                  <p>image5:<input name="img_options[img5]" type="text" id="inputtext5" value="<?php  echo $show_img5 ?>" style='width:90%;' /></p>
                  <p>image6:<input name="img_options[img6]" type="text" id="inputtext6" value="<?php  echo $show_img6 ?>" style='width:90%;' /></p>
                </div>
              </div>
              <!--ここからフッターへ-->
              <div style="padding: 0px 30px 0px;">
                <!--　　▽自由編集ゾーン▽　　-->
                <div style="width:50%; float: left;">
                  <p>You_Profile</p>
                  <textarea id="inputtext7" name="img_options[profile]" cols=40 rows=8 style="width:100%";><?php  echo $show_profile ?></textarea>
                </div>
                <div style="width:50%; float: right;">
                  <p>You_Career</p>
                  <textarea id="inputtext8" name="img_options[Career]" cols=40 rows=8 style="width:100%"><?php  echo $show_Career ?></textarea>
                </div>
                <!--　　△自由編集ゾーン△　　-->
              </div>
            </div>
            <hr />
            <table class="form-table">
                <tr>
                <th scope="row"><label for="inputtext11">ソースコード</label></th>
                <td>
                <textarea id="src" name="img_options[area]" cols=40 rows=4 STYLE="color:#00FF00;background-color:#404040;width:100%;height:250px;" readonly></textarea>
              　</td>
                </tr>
            </table>
          </form>
          <button id="make">Create a Sourcecode</button>
          <button id="del">delete</button>

          <br /><br /><br />
          <hr />
            <!--jQ-->
            <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
            <script>
            //全選択
            function nonColor(){
              document.getElementById("tdimg1").style.backgroundColor = '';
              document.getElementById("tdimg2").style.backgroundColor = '';
              document.getElementById("tdimg3").style.backgroundColor = '';
              document.getElementById("tdimg4").style.backgroundColor = '';
              document.getElementById("tdimg5").style.backgroundColor = '';
              document.getElementById("tdimg6").style.backgroundColor = '';
              document.getElementById("tdimg6").style.backgroundColor = '';
              document.getElementById("tdbigimg").style.backgroundColor = '';
              document.getElementById("tdpro").style.backgroundColor = '';
              document.getElementById("tdcarr").style.backgroundColor = '';
            }
            $(function(){
              $('#src').click(function(){
                    $(this).select();
                    return false;
              });
              $('#del').click(function(){
                document.getElementById("src").value ='';
              });
              $('#inputtext1').focus(function(){
                  nonColor();
                  document.getElementById("tdimg1").style.backgroundColor = 'red';
              }).blur(function(){
                  nonColor();
              });

              $('#inputtext2').focus(function(){
                  nonColor();
                  document.getElementById("tdimg2").style.backgroundColor = 'red';
              }).blur(function(){
                  nonColor();
              });
              $('#inputtext3').focus(function(){
                  nonColor();
                  document.getElementById("tdimg3").style.backgroundColor = 'red';
              }).blur(function(){
                  nonColor();
              });
              $('#inputtext4').focus(function(){
                  nonColor();
                  document.getElementById("tdimg4").style.backgroundColor = 'red';
              }).blur(function(){
                  nonColor();
              });
              $('#inputtext5').focus(function(){
                  nonColor();
                  document.getElementById("tdimg5").style.backgroundColor = 'red';
              }).blur(function(){
                  nonColor();
              });
              $('#inputtext6').focus(function(){
                  nonColor();
                  document.getElementById("tdimg6").style.backgroundColor = 'red';
              }).blur(function(){
                  nonColor();
              });
              $('#inputtext7').focus(function(){
                  nonColor();
                  document.getElementById("tdpro").style.backgroundColor = 'red';
              }).blur(function(){
                  nonColor();
              });
              $('#inputtext8').focus(function(){
                  nonColor();
                  document.getElementById("tdcarr").style.backgroundColor = 'red';
              }).blur(function(){
                  nonColor();
              });
              $('#make').click(function(){
                var imgUrl = [];//配列を作成する
                var imgUrltop = document.getElementById("inputtext1").value;
                imgUrl.push(document.getElementById("inputtext1").value);
                imgUrl.push(document.getElementById("inputtext2").value);
                imgUrl.push(document.getElementById("inputtext3").value);
                imgUrl.push(document.getElementById("inputtext4").value);
                imgUrl.push(document.getElementById("inputtext5").value);
                imgUrl.push(document.getElementById("inputtext6").value);

                var profile = document.getElementById("inputtext7").value;
                var Career = document.getElementById("inputtext8").value;
                var left = document.getElementById("inputtext9").value;
                var right = document.getElementById("inputtext10").value;
                var sum = parseInt(right) + parseInt(left);
                if(imgUrl[0].length<5){
                  alert('画像をセットしてください。');
                  return;
                }

                //値が入っていればtableタグに変える
                for ( var i = 0; i < 6; i++ ) {
                    imgUrl[i] = (imgUrl[i].length>5)? '<td><img src="'+imgUrl[i]+'" onmouseover="document.images[\'myBigImage\'].src=\''+imgUrl[i]+'\';" onClick="document.images[\'myBigImage\'].src=\''+imgUrl[i]+'\';" height="100%" width="100%" /></td>' : "" ;
                    //alert(imgUrl[i]);
                }


                document.getElementById("src").value ='\
<div style="width: 100%; text-align: left; margin: 0 auto;">\n\
<div style="margin: 0 10px;">\n\
<div style="width: calc((100% / '+sum+')*'+left+'); float: left;">\n\
<!--メインスペース-->\n\
<center><img src="'+imgUrltop+'" alt="" name="myBigImage" /></center>\n\
</div>\n\
<div style="width: calc((100% / '+sum+')*'+right+'); float: right;">\n\
<!--サイドバー-->\n\
'+profile+'\n\
</div>\n\
</div>\n\
<!--ここからフッターへ-->\n\
<table>\n\
<tbody>\n\
<tr>\n\
'+imgUrl[0]+'\n\
'+imgUrl[1]+'\n\
'+imgUrl[2]+'\n\
'+imgUrl[3]+'\n\
'+imgUrl[4]+'\n\
'+imgUrl[5]+'\n\
</tr>\n\
</tbody>\n\
</table>\n\
<div style="padding: 0px 30px 0px;">\n\
<!--　　▽自由編集ゾーン▽　　-->\n\
'+Career+'\n\
<!--　　△自由編集ゾーン△　　-->\n\
</div>\n\
</div>\n\
';
              });



            });
            </script>

    <!-- /.wrap --></div>
    <?php
}
}
$stext = new ProfilePageMaker;
