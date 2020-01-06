@extends('bk.layout.auth')

@section('content')
<div class="container">
    <div class="content-viewport">
        <div class="row">
          <div class="col-lg-6 equel-grid">
            <div class="grid">
              <p class="grid-header">Sample Elements</p>
              <div class="grid-body">
                <div class="item-wrapper">
                  <form>
                    <div class="form-group">
                      <label for="inputEmail1">Email</label>
                      <input type="email" class="form-control" id="inputEmail1" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                      <label for="inputPassword1">Password</label>
                      <input type="password" class="form-control" id="inputPassword1" placeholder="Enter your password">
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Sign in</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 equel-grid">
            <div class="grid">
              <p class="grid-header">Horizontal Elements</p>
              <div class="grid-body">
                <div class="item-wrapper">
                  <form>
                    <div class="form-group row showcase_row_area">
                      <div class="col-md-3 showcase_text_area">
                        <label for="inputEmail10">Name</label>
                      </div>
                      <div class="col-md-9 showcase_content_area">
                        <input type="text" class="form-control" id="inputEmail10" placeholder="Enter your name">
                      </div>
                    </div>
                    <div class="form-group row showcase_row_area">
                      <div class="col-md-3 showcase_text_area">
                        <label for="inputEmail4">Email</label>
                      </div>
                      <div class="col-md-9 showcase_content_area">
                        <input type="email" class="form-control" id="inputEmail4" placeholder="Enter your email">
                      </div>
                    </div>
                    <div class="form-group row showcase_row_area">
                      <div class="col-md-3 showcase_text_area">
                        <label for="inputEmail5">Password</label>
                      </div>
                      <div class="col-md-9 showcase_content_area">
                        <input type="password" class="form-control" id="inputEmail5" placeholder="Enter your password">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Sign in</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="grid">
              <p class="grid-header">Input Types</p>
              <div class="grid-body">
                <div class="item-wrapper">
                  <div class="row mb-3">
                    <div class="col-md-8 mx-auto">
                      <div class="form-group row showcase_row_area">
                        <div class="col-md-3 showcase_text_area">
                          <label for="inputType1">Name</label>
                        </div>
                        <div class="col-md-9 showcase_content_area">
                          <input type="text" class="form-control" id="inputType1" value="Sara Watson">
                        </div>
                      </div>
                      <div class="form-group row showcase_row_area">
                        <div class="col-md-3 showcase_text_area">
                          <label for="inputType12">Email</label>
                        </div>
                        <div class="col-md-9 showcase_content_area">
                          <input type="email" class="form-control" id="inputType2" value="asfabiv@rud.eu">
                        </div>
                      </div>
                      <div class="form-group row showcase_row_area">
                        <div class="col-md-3 showcase_text_area">
                          <label for="inputType13">Password</label>
                        </div>
                        <div class="col-md-9 showcase_content_area">
                          <input type="password" class="form-control" id="inputType3" value="00000000"> </div>
                      </div>
                      <div class="form-group row showcase_row_area">
                        <div class="col-md-3 showcase_text_area">
                          <label for="inputType1">Number</label>
                        </div>
                        <div class="col-md-9 showcase_content_area">
                          <input type="number" class="form-control" id="inputType4" value="83393922">
                        </div>
                      </div>
                      <div class="form-group row showcase_row_area">
                        <div class="col-md-3 showcase_text_area">
                          <label for="inputType5">Disabled</label>
                        </div>
                        <div class="col-md-9 showcase_content_area">
                          <input type="text" class="form-control" id="inputType5" value="Hulda Stevenson" disabled>
                        </div>
                      </div>
                      <div class="form-group row showcase_row_area">
                        <div class="col-md-3 showcase_text_area">
                          <label for="inputType7">Placeholder</label>
                        </div>
                        <div class="col-md-9 showcase_content_area">
                          <input type="text" class="form-control" id="inputType7" placeholder="Placeholder Text">
                        </div>
                      </div>
                      <div class="form-group row showcase_row_area">
                        <div class="col-md-3 showcase_text_area">
                          <label for="inputType8">Read-only</label>
                        </div>
                        <div class="col-md-9 showcase_content_area">
                          <input type="text" class="form-control" id="inputType8" readonly="readonly" value="Hulda Stevenson">
                        </div>
                      </div>
                      <div class="form-group row showcase_row_area">
                        <div class="col-md-3 showcase_text_area">
                          <label for="inputType9">Textarea</label>
                        </div>
                        <div class="col-md-9 showcase_content_area">
                          <textarea class="form-control" id="inputType9" cols="12" rows="5"></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="grid">
              <p class="grid-header">Form Elements</p>
              <div class="grid-body">
                <div class="item-wrapper">
                  <div class="row">
                    <div class="col-md-8 mx-auto">
                      <div class="row showcase_row_area">
                        <div class="col-md-3 showcase_text_area">
                          <label>Custom Select</label>
                        </div>
                        <div class="col-md-9 showcase_content_area">
                          <select class="custom-select">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                        </div>
                      </div>
                      <div class="row showcase_row_area">
                        <div class="col-md-3 showcase_text_area">
                          <label>Custom Select (Multiple)</label>
                        </div>
                        <div class="col-md-9 showcase_content_area">
                          <select class="custom-select" multiple>
                            <option>Open this select menu</option>
                            <option value="1">One</option>
                            <option selected value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                        </div>
                      </div>
                      <div class="row showcase_row_area mb-3">
                        <div class="col-md-3 showcase_text_area">
                          <label>Range Slider</label>
                        </div>
                        <div class="col-md-9 showcase_content_area">
                          <div class="form-group mb-0">
                            <input type="range" class="custom-range"> </div>
                        </div>
                      </div>
                      <div class="row showcase_row_area">
                        <div class="col-md-3 showcase_text_area">
                          <label>Radio</label>
                        </div>
                        <div class="col-md-9 showcase_content_area">
                          <div class="form-group">
                            <div class="radio">
                              <label class="radio-label mr-4">
                                <input name="sample" type="radio" checked>Option 1 <i class="input-frame"></i>
                              </label>
                            </div>
                            <div class="radio">
                              <label class="radio-label">
                                <input name="sample" type="radio">Option 2 <i class="input-frame"></i>
                              </label>
                            </div>
                          </div>
                          <div class="form-inline">
                            <div class="radio mb-3">
                              <label class="radio-label mr-4">
                                <input name="sample" type="radio" checked>Option 1 <i class="input-frame"></i>
                              </label>
                            </div>
                            <div class="radio mb-3">
                              <label class="radio-label">
                                <input name="sample" type="radio">Option 2 <i class="input-frame"></i>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row showcase_row_area">
                        <div class="col-md-3 showcase_text_area">
                          <label>Checkbox</label>
                        </div>
                        <div class="col-md-9 showcase_content_area">
                          <div class="form-group">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" class="form-check-input"> Default <i class="input-frame"></i>
                              </label>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" class="form-check-input" checked> Checked <i class="input-frame"></i>
                              </label>
                            </div>
                          </div>
                          <div class="form-inline">
                            <div class="checkbox mb-3">
                              <label>
                                <input type="checkbox" class="form-check-input"> Default <i class="input-frame"></i>
                              </label>
                            </div>
                            <div class="checkbox mb-3">
                              <label>
                                <input type="checkbox" class="form-check-input" checked> Checked <i class="input-frame"></i>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row showcase_row_area mb-3">
                        <div class="col-md-3 showcase_text_area">
                          <label>File Upload</label>
                        </div>
                        <div class="col-md-9 showcase_content_area">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="grid">
              <p class="grid-header">Inputs Sizes</p>
              <div class="grid-body">
                <div class="item-wrapper">
                  <div class="row">
                    <div class="col-md-8 mx-auto">
                      <div class="form-group row showcase_row_area">
                        <div class="col-md-3 showcase_text_area">
                          <label for="inputType12">Large</label>
                        </div>
                        <div class="col-md-9 showcase_content_area">
                          <input type="text" class="form-control form-control-lg" id="inputType12" value="Sara Watson">
                        </div>
                      </div>
                      <div class="form-group row showcase_row_area">
                        <div class="col-md-3 showcase_text_area">
                          <label for="inputType13">Default</label>
                        </div>
                        <div class="col-md-9 showcase_content_area">
                          <input type="text" class="form-control" id="inputType13" value="Sara Watson">
                        </div>
                      </div>
                      <div class="form-group row showcase_row_area">
                        <div class="col-md-3 showcase_text_area">
                          <label for="inputType14">Small</label>
                        </div>
                        <div class="col-md-9 showcase_content_area">
                          <input type="text" class="form-control form-control-sm" id="inputType14" value="Sara Watson">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection
