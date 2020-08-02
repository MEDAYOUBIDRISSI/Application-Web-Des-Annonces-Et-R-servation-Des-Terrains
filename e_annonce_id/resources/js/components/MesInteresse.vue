<template>
    <section class="profilePage">
            <coverphoto></coverphoto>
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
                                                <div class="editing-interest">
                                                    <h5 class="f-title"><i class="ti-bell"></i>All Notifications </h5>
                                                    <div class="notification-box">
                                                        {{fetchUsers($route.params.publication_id)}}
                                                        <ul>
                                                            <li v-for="user in users" v-bind:key="user.id">
                                                                <figure><img :src="user.url" alt=""></figure>
                                                                <div class="notifi-meta">
                                                                    <p>{{user.prenom}} Interesse your post</p>
                                                                </div>
                                                                <button title="Accept ce Intéressé" @click="acpinteress(user.id,$route.params.publication_id)" class="we-reply" style="border: none; background-color: rgb(253, 253, 253); color: grey;position:relative;left:340px;bottom:47px;"><i class="fa fa-paper-plane"></i> Accept intéressé</button>
                                                                <i class="del fa fa-close" @click="delacpinteress(user.id,$route.params.publication_id)"></i>
                                                            </li>
                                                        </ul>
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
      publication_id:'',
      user_id: '',
      pagination: {},
      edit: false
    };
  },
  created() {
    this.fetchpublication();
    this.fetchUsers();
  },

  methods: {
    fetchUsers(id) {
		let dta;
      fetch(`mesinteress/${id}`)
      .then(res => res.json())
      .then(res => { 
		 this.users=res;
		 console.log(res);
      })
      },
      acpinteress(iduser,idpup) {
		let dta;
      fetch(`acpinteress/${iduser}/${idpup}`)
      .then(res => res.json())
      .then(res => { 
          alert("this accept");
		 this.users=res;
		 console.log(res);
      })
	  },
      delacpinteress(iduser,idpup) {
		let dta;
      fetch(`delacpinteress/${iduser}/${idpup}`)
      .then(res => res.json())
      .then(res => { 
          alert("this refuse");
		 this.users=res;
		 console.log(res);
      })
	  }
  }
};
</script>
