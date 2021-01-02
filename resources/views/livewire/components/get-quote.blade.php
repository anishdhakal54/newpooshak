   @extends('layouts.app')
    @section('content')
    <div>
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 bg-img d-none d-sm-flex align-items-end"
                   style="background-image: url('https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1331&q=80')">
                   
              </div>
              <div class="col-md-6 py-5 px-sm-5 ">
                <form id="get-quote">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">First Name</label>
                            <input class="form-control" type="text"
                                   placeholder="Enter your first name here.."
                                   wire:model="firszstname"/>
                            @if ($errors->has('firstname'))
                                <span class="error help-block">{{ $errors->first('firstname') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Last Name</label>
                            <input class="form-control" type="text"
                                   placeholder="Enter your lastname here.."
                                   wire:model="lastname"/>
                            @if ($errors->has('lastname'))
                                <span class="error help-block">{{ $errors->first('lastname') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Email</label>
                        <input class="form-control " type="email"
                               placeholder="Enter your email  here.."
                               wire:model="email"/>
                        @if ($errors->has('email'))
                            <span class="error help-block">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="inputEmail4">Company Name</label>
                        <input class="form-control" type="text"
                               placeholder="Enter Company Name"
                               wire:model="companyname"/>
                        @if ($errors->has('companyname'))
                            <span class="error help-block">{{ $errors->first('companyname') }}</span>
                        @endif
                    </div>
            
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input class="form-control " type="text"
                               placeholder="Enter your address  here.."
                               wire:model="address"/>
                        @if ($errors->has('address'))
                            <span class="error help-block">{{ $errors->first('address') }}</span>
                        @endif
            
                    </div>
            
            
                    @php
                        $categories = \App\Category::all();
                    @endphp
            
                    @if($categories->count()>0)
                        <div class="form-group">
                            <label for="inputState">Category</label>
                            @foreach($categories as $category)
                                <div>
                                    <input type="checkbox" class="checkbox form-control" wire:model="category.{{ $category->id}}"
                                           value="{{$category->id}}">
                                    <label>{{$category->name}}</label>
                                </div>
                            @endforeach
                        </div>
            
                    @endif
            
                    @if(!Auth::check())
                    <button type="button" class="btn_add_to_cart" data-toggle="modal" data-target="#demoModal3669">Submit</button>
    
                    @else
                    <button class="btn btn-cta btn-submitnow" type="button" wire:click="sendquote" wire:loading.class="disabled">
                        <span><i wire:loading wire:target="sendquote" class="fas fa-spinner fa-spin"></i> Submit</span>
            
                    </button>
                    @endif
            
                </form>
              </div>
            </div>
          </div>
        
    
    
        
               <style>
            #get-quote input.checkbox {
                display: inline-block;
                width: unset;
                height: auto;
                margin-right: 7px;
            }
        </style> 
    
    <div wire:ignore class="modal fade loginmodal" id="demoModal3669" tabindex="-1" role="dialog"
      aria-labelledby="demoModal3669" aria-hidden="true">
      <div class="modal-dialog  modal-dialog-centered  " role="document">
        <div class="modal-content">
          <div class="modal-body py-sm-4 px-sm-5">
    
            <button type="button" class="close " data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <div class="text-center pt-5">
              <img src="{{asset('assets/images/login.svg')}}" class="loginsvg">
              <h3 class="loginheadings">Login</h3>
    
    
            </div>
            <form>
    
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input wire:model='login_email' type="email" class="form-control" id="exampleInputEmail1"
                  aria-describedby="emailHelp">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input wire:model='password' type="password" class="form-control" id="exampleInputEmail1"
                  aria-describedby="emailHelp">
              </div>
    
              <div class="login_button">
                <button type="submit" wire:click="login" wire:loading.class="disabled">
                  <span><i wire:loading wire:target="login" class="fas fa-spinner fa-spin"></i> Login</span>
            
                </button>
              </div>
              <div class="for">
                <div class="left_forgot">
                  <a href="#">Forgot Password?</a>
                </div>
                <div class="new">
                  New to Poshak? <a href="register.html">Click here to register.</a>
                </div>
              </div>
    
    
    
              <span class="or">OR</span>
    
              <div class="social_last_share login_share" style="margin-bottom: 1rem">
    
                <div class="login_button social_button">
                  <button type="submit">Sign In With Facebook <img
                      src="{{asset('assets/images/facebook.png')}}"></button>
                  <button type="submit">Sign In With Google <img
                      src="{{asset('assets/images/gmail.svg')}}"></button>
                </div>
              </div>
    
    
            </form>
    
    
    
          </div>
    
        </div>
      </div>
      <div class="hehehe">
        <img src="assets/images/hehehe.png">
      </div>
    </div>
    
    
    </div>
    @endsection
   