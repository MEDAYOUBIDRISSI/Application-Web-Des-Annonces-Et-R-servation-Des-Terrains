<template>
    <section class="profilePage">
            <!-- <coverphoto></coverphoto> -->
            {{fetchUsers($route.params.user_id_user)}}
            {{fetchImages($route.params.user_id_user)}}
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
                                        <router-link class="" :to="'/profile_auther/'+user.id" title="" data-ripple="">Journale</router-link>
                                        <router-link class="active" :to="'/photos_auther/'+user.id" title="" data-ripple="">Photos</router-link>
                                        <a class="" href="#" title="" data-ripple="">Videos</a>
                                        <a class="" href="#" title="" data-ripple="">Friends</a>
                                        <a class="" href="#" title="" data-ripple="">Groups</a>
                                        <a class="" href="#" title="" data-ripple="">about</a>
                                        <a class="" href="#" title="" data-ripple="">more</a>
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
                                                </ul>
                                                <div class="lodmore"><button class="btn-view btn-load-more"></button></div>
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
    //this.fetchUsers();
   // this.fetchImages();
  },

  methods: {
    fetchUsers(id) {
		let dta;
      fetch(`indexall_edite/${id}`)
      .then(res => res.json())
      .then(res => { 
		 this.users=res.data;
		 console.log(res.data);
      })
      .catch(err => console.log(err));
	},
    fetchImages(id) {
		let dta;
      fetch(`imageusers_edite/${id}`)
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
    }
  }
};
</script>