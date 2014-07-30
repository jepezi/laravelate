<div class="sidebar-content">
    <img src="/assets/images/logo_graphic.png" alt="" class="logo-graphic">
    <a href="/"><img src="/assets/images/logo_dudedb.png" alt="DudeDB"></a>
    <small>ผู้ชาย..ต้องรู้เยอะ</small>
    <div class="about-dude-panel">
        ไม่ว่าคุณเกิดยุคไหน ผู้ชายต้องรู้เยอะ ความเชื่อนี้ยิ่งโคตรจริงในยุคนี้ ยุคที่ข้อมูลว่อนเน็ท ดู๊ดดีบีเลยอ่านมาให้ก่อน แล้วสรุปสิ่งที่ควรรู้จริงๆ แล้วรวมรวมมาให้คุณผู้ชายได้เสพย์แล้วเอาเวลาไปทำอย่างอื่น
        </div>
    <!-- <div class="subscribe">

        <form class="form-inline" role="form">
            <div class="form-group">
            <label class="sr-only" for="exampleInputEmail2">Email address</label>
            <input type="email" class="form-control input-sm" id="exampleInputEmail2" placeholder="Enter email">
            </div>

            <button type="submit" class="btn btn-default btn-sm">สมัคร</button>
            </form>
        <small>ไม่อยากเช็คเว็บไซต์ ให้เราส่งเรื่องเด็ดเข้าเมล์แทน กรอกเมล์เลย</small>    
        </div> -->
    
    <!-- Begin MailChimp Signup Form -->
    <!-- <link href="//cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet" type="text/css"> -->
    @if (App::environment('local'))
    <div id="mc_embed_signup" class="subscribe">
        <small>ไม่อยากเช็คเว็บไซต์ ให้เราส่งเรื่องเด็ดเข้าเมล์แทน</small> 
    <form action="//dudedb.us8.list-manage.com/subscribe/post?u=dfdeae7c79940d651802c408e&amp;id=5b71df7024" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
        <input type="email" value="" name="EMAIL" class="email input-sm" style="display:inline" id="mce-EMAIL" placeholder="ใส่อีเมล์ที่นี่เลย" required>
        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
        <div style="position: absolute; left: -5000px;"><input type="text" name="b_dfdeae7c79940d651802c408e_5b71df7024" tabindex="-1" value=""></div>
        <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-default btn-sm"></div>
    </form> 
    </div>
    @endif
    <!--End mc_embed_signup-->

    <div>
        <a href="#">Login with Facebook</a>
        </div>

    <div class="telldude">
        <a href="{{ URL::route('tell') }}" class="telldude-link">มีลิ้งค์เด็ด แชร์แอดมินที่นี่</a>
        </div>
</div>