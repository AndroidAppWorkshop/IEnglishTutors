<div class="container" role="tabpanel" style="width:666px">

  <!-- Nav tabs -->
  <ul class="nav  nav-tabs" role="tablist">
    <li role="presentation" class="active">
      <a 
        href="#uploadByURL" 
        aria-controls="uploadByURL" 
        role="tab" 
        data-toggle="tab">貼上圖片網址
      </a>
    </li>

    <li role="presentation">
      <a 
        href="#uploadByFILE" 
        aria-controls="uploadByFILE" 
        role="tab" 
        data-toggle="tab">上傳圖片
      </a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="uploadByURL">
      <form action="DoDownload" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-lg-12">
            <div class="input-group">
              <input 
                type="text" 
                name="TargetURL" 
                class="form-control" 
                placeholder=""
                required/>
              <span class="input-group-btn">
                <input 
                  class="btn btn-default" 
                  type="submit"
                  value="下載"
                />
              </span>
            </div><!-- /input-group -->
          </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
      </form>
    </div>

    <div role="tabpanel" class="tab-pane" id="uploadByFILE">
      <form action="DoUpload" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-lg-12">
            <div class="input-group">
                        
              <input type="file" name="PhotoFile">
                <span class="input-group-btn">
                  <input 
                    class="btn btn-default" 
                    type="submit"
                    value="上傳"
                  />
                </span>
            </div><!-- /input-group -->
          </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
      </form>
    </div>
  </div>

</div>