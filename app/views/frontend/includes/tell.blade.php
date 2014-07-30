<h2>แชร์ลิ้งค์เด็ด</h2>
<p>ดู๊ดดีบีเกิดมาเพื่อพี่น้องชาวไทย และเราเข้าใจว่าผู้ชายอย่าเราสนใจหลายเรื่อง แต่ลิ้งค์ในเว็บเราต้องไม่ส่งเสริมเรื่องแย่ๆ ดังนั้นถ้ามั่นใจว่าเจอเรื่องเด็ดๆ ที่คิดว่าน่าแชร์ให้ดู๊ดคนอื่นๆ รู้ด้วย..ก็ส่งมาเลยครับ</p>

<hr>
{{ Form::open(['route' => 'tell', 'class' => 'form-horizontal']) }}
<fieldset>

<!-- Text input-->
<div class="form-group">
  <label class="control-label col-sm-2" for="dudeLink">Link URL</label>
  <div class="col-sm-10">
    <input id="dudeLink" name="url" type="text" placeholder="Link URL" class="form-control">
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="control-label col-sm-2" for="dudeCaption">บทสรุป ขอสั้นๆ</label>
  <div class="col-sm-10">                     
    <textarea id="dudeCaption" name="caption" class="form-control" placeholder="เรื่องมีอยู่ว่า.."></textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="control-label col-sm-2" for="dudeFrom">จากใคร</label>
  <div class="col-sm-10">
    <input id="dudeFrom" name="from" type="text" placeholder="แม้นแมน" class="form-control">
    <p class="help-block">แอดมินจะใส่ชื่อเครดิตตามชื่อที่ให้ เช่น แชร์โดยคุณแม้นแมน</p>
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">

  <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-success">ส่งเลย</button>
  </div>
</div>

</fieldset>
{{ Form::close() }}

<hr>
<a href="{{ URL::route('home') }}" class="btn btn-link btn-sm"><i class="fa fa-chevron-left"></i> กลับหน้าแรก</a>
