<template>
    <section class="profilePage">
            <!-- <coverphoto></coverphoto> -->
            {{fetchUsers($route.params.user_id_user)}}
            {{fetchpublication($route.params.user_id_user)}}
            <div class="feature-photo" >
                <figure v-for="user in users" v-bind:key="user.id"><img :src="user.coverture" alt=""></figure>
                <!-- <div class="add-btn">
                    <span></span>
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
                                        <router-link class="active" :to="'/profile_auther/'+user.id" title="" data-ripple="">Journale</router-link>
                                        <router-link class="" :to="'/photos_auther/'+user.id" title="" data-ripple="">Photos</router-link>
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
                                            <div class="loadMore">
                                                <div class="central-meta item" v-for="pub in publications" v-bind:key="pub.id">
                                                    <div class="user-post">
                                                        <div class="friend-info" >
                                                            <figure v-for="user in users" v-bind:key="user.id">
                                                                <img :src="user.url" alt="">
                                                            </figure>
                                                            <div class="friend-name" v-for="user in users" v-bind:key="user.id">
                                                                <ins><a href="time-line.html" title="">{{user.nom}} {{user.prenom}}</a></ins>
                                                                <span>published: {{pub.created_at}}</span>
                                                            </div>
                                                            <div class="post-meta" >
                                                                    <img :src="pub.url" alt="">
                                                                
                                                                <div class="description">
                                                                    <p><a href="#" title="">{{pub.titre}} !</a></p>
                                                                    <p>{{pub.pub}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <aside class="sidebar static right">
                                            <advertisment></advertisment>
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
        publications: [],
      	publication: {
        id:'',
        titre:'',
        pub:'',
        user_id:'',
        url:'',
        date_creation:'',
        created_at:''
        },
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
   // this.fetchUsers();
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
	geturl()
	{
		return this.data.url;
    },
    fetchpublication(id) {
		let dta;
      fetch(`publication_edite/${id}`)
      .then(res => res.json())
      .then(res => { 
		 this.publications=res.data;
		 //console.log(res.data);
      })
    },
  }
};
</script>