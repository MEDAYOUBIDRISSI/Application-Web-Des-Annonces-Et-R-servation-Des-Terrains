<template>
    <section class="profilePage">
            <!-- <coverphoto></coverphoto> -->
            <div class="feature-photo" >
                <figure v-for="user in users" v-bind:key="user.id"><img :src="user.coverture" alt=""></figure>
                <!-- <div class="add-btn">
                    <span>1205 followers</span>
                    <a href="#" title="" data-ripple="">Add Friend</a>
                </div> -->
                <form class="edit-phto">
                    <i class="fa fa-camera-retro"></i>
                    <label class="fileContainer">
                        Edit Cover Photo
                    <input type="file"/>
                    </label>
                </form>
                <div class="container-fluid">
                    <div class="row merged">
                        <div class="col-lg-2 col-sm-3">
                            <div class="user-avatar">
                                <figure v-for="user in users" v-bind:key="user.id">
                                    <img :src="user.url" alt="" style="height:150px;width:150px;">
                                    <form class="edit-phto">
                                        <i class="fa fa-camera-retro"></i>
                                        <label class="fileContainer">
                                            Edit Display Photo
                                            <input type="file"/>
                                        </label>
                                    </form>
                                    <label style="opacity:0">{{photo.user_id=user.id}}</label>
                                </figure>
                            </div>
                        </div>
                        <div class="col-lg-10 col-sm-9">
                            <div class="timeline-info" v-for="user in users" v-bind:key="user.id">
                                <ul>
                                    <li class="admin-name">
                                    <h5>{{user.nom}} {{user.prenom}}</h5>
                                    <span>Group Admin</span>
                                    </li>
                                    <li>
                                        <router-link class="" to="/home2" title="" data-ripple="">Journale</router-link>
                                        <router-link class="active" to="/photos" title="" data-ripple="">Photos</router-link>
                                        <!-- <a class="" href="#" title="" data-ripple="">Videos</a>
                                        <a class="" href="#" title="" data-ripple="">Friends</a>
                                        <a class="" href="#" title="" data-ripple="">Groups</a>
                                        <a class="" href="#" title="" data-ripple="">about</a>
                                        <a class="" href="#" title="" data-ripple="">more</a> -->
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section>
                <div class="gap gray-bg">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row merged20" id="page-contents">
                                    <div class="col-lg-3">
                                        <aside class="sidebar static left">
                                                <shortcuts></shortcuts>
                                                <recentactivity></recentactivity>
                                                <whosfollownig></whosfollownig>
                                        </aside>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                            <div class="central-meta">
                                                <ul class="photos">
                                                    <li v-for="image in images" v-bind:key="image.id">
                                                        <a class="strip" :href="image.url" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
                                                            <img :src="image.url" alt="">
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="" data-toggle="modal" data-target="#exampleModalScrollable">
                                                            <img src="images/add.png" alt="" style="width:50px">
                                                        </a>
                                                    </li>
                                                </ul>
                                                <div class="lodmore"><button type="file" class="btn-view btn-load-more"></button></div>
                                            </div>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalScrollableTitle">ADD NEW PHOTO</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form @submit.prevent="addimg"> 
                                                                <div class="form-group half">	
                                                                    <div class="edit-phto" style="position: relative;left: 0px;bottom: -10px;">
                                                                        <i class="fa fa-camera-retro"></i>
                                                                        <label class="fileContainer">
                                                                        Photo
                                                                        <input type="file" required="required"  @change="imagechanged">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="submit-btns">
                                                                    <button type="submit" class="mtr-btn"><span>Add</span></button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!-- <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Save changes</button>
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <aside class="sidebar static right">
                                            <advertisment></advertisment>
                                            <invitefriends></invitefriends>
                                            <friendlist></friendlist>
                                        </aside>
                                    </div>
                                </div>	
                            </div>
                        </div>
                    </div>
                </div>	
	        </section>
        </section>
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
      images:[],
      image:
      {
        id:'',
        url:'',
      },
      photo:
      {
        id:'',
        url:'',
        user_id:'',
      },
      user_id: '',
      pagination: {},
      edit: false
    };
  },

  created() {
    this.fetchUsers();
    this.fetchImages();
  },

  methods: {
    fetchUsers() {
		let dta;
      fetch(`indexall`)
      .then(res => res.json())
      .then(res => { 
		 this.users=res.data;
		 console.log(res.data);
      })
      .catch(err => console.log(err));
    },
    fetchImages() {
		let dta;
      fetch(`imageusers`)
      .then(res => res.json())
      .then(res => { 
		 this.images=res.data;
		 console.log(res.data);
      })
      .catch(err => console.log(err));
	},
	geturl()
	{
		return this.data.url;
    },
    imagechanged(e)
     {
         var fileReader=new FileReader();
         fileReader.readAsDataURL(e.target.files[0]);
         fileReader.onload=(e)=>{
             this.photo.url=e.target.result
         }
         console.log(this.photo);

     },
     addimg() {
        // Add
        fetch('api/imageprofile', {
          method: 'post',
          body: JSON.stringify(this.photo),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
           // this.image.terrain_id='';
           $('#exampleModalScrollable').modal('hide');
           $('body').removeClass('modal-open'); 
            $('.modal-backdrop').remove();
            this.photo.url='';
            this.fetchImages();
            alert('image Added');
          })
    },
  }
};
</script>