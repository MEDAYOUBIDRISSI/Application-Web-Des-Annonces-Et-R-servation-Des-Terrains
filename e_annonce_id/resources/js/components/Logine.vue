<template>
<div class="container-fluid pdng0">
    <div class="row merged">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="background-image: url(images/resources/player1.jpg);">
            <div class="">
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
            <div class="login-reg-bg">
                <div class="log-reg-area sign">
                    <h2 class="log-title">Login</h2>
                        <p>
                            Don’t use Winku Yet? <a href="#" title="">Take the tour</a> or <a href="#" title="">Join now</a>
                        </p>
                    <form  @submit.prevent="loginnow">
                        <div class="form-group">	
                            <input type="text" id="input" required="required" v-model="user.email"/>
                            <label class="control-label" for="input">Email</label><i class="mtrl-select"></i>
                        </div>
                        <div class="form-group">	
                            <input type="password" required="required" value="123456" v-model="user.password"/>
                            <label class="control-label" for="input">Password</label><i class="mtrl-select"></i>
                        </div>
                        <div class="checkbox">
                            <label>
                            <input type="checkbox" checked="checked"/><i class="check-box"></i>Always Remember Me.
                            </label>
                        </div>
                        <a href="#" title="" class="forgot-pwd">Forgot Password?</a>
                        <div class="submit-btns">
                            <button class="mtr-btn signin" type="submit"><span>Login</span></button>
                            <button class="mtr-btn signup" type="button"><span>Register</span></button>
                        </div>
                    </form>
                </div>
                <!-- <div class="log-reg-area reg" style="position: relative;top: 400px; margin-bottom:30px;">
                    <h2 class="log-title">Register</h2>
                    <form action="" enctype="multipart/form-data">
                        <div class="form-group">	
                            <input type="text" required="required" name="nom"/>
                            <label class="control-label" for="input">First Name</label><i class="mtrl-select"></i>
                        </div>
                        <div class="form-group">	
                            <input type="text" required="required" name="prenom"/>
                            <label class="control-label" for="input">Last Name</label><i class="mtrl-select"></i>
                        </div>
                        <div class="form-group">	
                            <input type="email" required="required" name="email"/>
                            <label class="control-label" for="input">Email</label><i class="mtrl-select"></i>
                        </div>
                        <div class="form-group">	
                            <input type="password" required="required" name="password"/>
                            <label class="control-label" for="input">Password</label><i class="mtrl-select"></i>
                        </div>
                        <div class="form-group">	
                            <input type="date" required="required" name="dateNaissance"/>
                            <label class="control-label" for="input">Date Naissance</label><i class="mtrl-select"></i>
                        </div>
                        <div class="form-group">	
                            <input type="tel" required="required" name="tel"/>
                            <label class="control-label" for="input">Tel</label><i class="mtrl-select"></i>
                        </div>
                        <div class="form-group">	
                            <input type="text" required="required" name="adresse"/>
                            <label class="control-label" for="input">Adress</label><i class="mtrl-select"></i>
                        </div>
                        <div class="form-group">	
                            <input type="text" required="required" name="ville"/>
                            <label class="control-label" for="input">Ville</label><i class="mtrl-select"></i>
                        </div>	
                        <div class="edit-phto" style="position: relative;left: 0px;bottom: -10px;">
                            <i class="fa fa-camera-retro"></i>
                            <label class="fileContainer">
                                Your Photo
                            <input type="file" name="image">
                            </label>
                        </div>
                        <div class="edit-phto" style="position: relative;left: 0px;bottom: -10px;">
                            <i class="fa fa-camera-retro"></i>
                            <label class="fileContainer">
                                Your Cover Photo 
                            <input type="file" name="coverture">
                            </label>
                        </div>
                        <div class="submit-btns">
                            <button class="mtr-btn signin" type="submit"><span>Register</span></button>
                            <a href="#" title="" class="already-have">Already have an account</a>
                        </div>
                    </form>
                </div> -->
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
  data() {
    return {
		users: [],
      	user: {
        id: '',
		nom: '',
		prenom: '',
		brand_name: '',
		email: '',
		password: '',
		dateNaissance: '',
		tel: '',
		adresse: '',
		laltitude: '',
		longitude: '',
		ville: '',
		coverture: '',
		url: '',
		type: ''
      },
      user_id: '',
      pagination: {},
      edit: false
    };
  },

  created() {

  },

  methods: {    
    loginnow() {
        // Add
        fetch('api/loginNow', {
          method: 'post',
          body: JSON.stringify(this.user),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
            this.clearForm();
            alert('publication Added');
          })
          .catch(err => console.log(err));
      
          
    },
    clearForm() 
    {
      this.user.id = null;
      this.user.email = '';
      this.user.password = '';
    }
  }
};
</script>