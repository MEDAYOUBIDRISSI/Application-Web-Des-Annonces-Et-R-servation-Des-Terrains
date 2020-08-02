<template>
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
                              <!-- <alert-box style="position: fixed">
                                
                              </alert-box> -->
                              <div>
                                <div class="alert alert-primary" role="alert" id="kaw" style="display:none;position: fixed;z-index:1;width:540px;margin:7px;">
                                  <span class="closebtn" @click="clsoutton()">&times;</span>
                                  <strong>Danger!</strong>A simple primary alert—check it out!
                                </div>
                              </div>
                              <div class="loadMore">
                                  <div class="central-meta item" v-for="dataa in dataas" v-bind:key="dataa.id">
                                      <div class="user-post">
                                          <div class="friend-info" >
                                              <figure v-for="image in dataa[1]" v-bind:key="image.id">
                                                  <img :src="image.url" alt="">
                                              </figure>
                                              <div class="friend-name" v-for="image in dataa[1]" v-bind:key="image.id">
                                                  <ins><a href="time-line.html" title="">{{image.nom}} {{image.prenom}}</a></ins>
                                                  <span>published: {{dataa[0].created_at}}</span>
                                              </div>
                                              <div class="coment-head" style="position:absolute;left:80%;" v-for="image in dataa[1]" v-bind:key="image.id">
                                                      <button class="we-reply" style="border: none;background-color:#fdfdfd; color:green;" title="Valider">C'est valide</button>
                                              </div>
                                              <div class="post-meta" >
                                                  <img :src="dataa[0].url" alt="">
                                                  <div class="description">
                                                      <p><a href="#" title="">{{dataa[0].titre}} !</a></p>
                                                      <p>{{dataa[0].pub}}</p>
                                                      <div v-for="image in dataa[1]" v-bind:key="image.id">
                                                          <p style="color:green">Contacter le propriétaire de la publication:</p>
                                                          <p>Tel : {{image.tel}}</p>
                                                          <p>Email : {{image.email}}</p>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>  
                              </div>
                                
                            </div>
                            <div class="col-lg-3">
                                <aside class="sidebar static right">
                                    <yourpage></yourpage>
                                    <friendlist></friendlist>
                                </aside>
                            </div>
                        </div>	
                    </div>
                </div>
            </div>
        </div>	
    </section>
</template>

<script>
export default {
  data() {
    return {
      dataas:[],
      dataa:{
      	publication: {
        id:'',
        titre:'',
        pub:'',
        user_id:'',
        url:'',
        date_creation:'',
        created_at:'',
       
      },
      image:[
        {
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
        url: ''
        }]},
      acps: [],			
        acp: {
        id: '',
        date_val: '',
        valide: '',
        publication_id: '',
        user_id:''
      },
      pagination: {},
      edit: false
    };
  }, 
  created() {
    this.fetchpublication();
  },
  methods: {
     fetchpublication() {
		let dta;
      fetch(`mesinteressall/val`)
      .then(res => res.json())
      .then(res => { 
		 this.dataas=res;
		 console.log(res);
      })
	},
    deleteactivepublication(id) {
      if (confirm('Are You Sure?')) {
        fetch(`acp/delete/${id}`)
          .then(res => res.json())
          .then(data => {
              // Vue.component('alert-box', {
              //   template: `
              //   <div class="alert alert-primary" role="alert" id="kaw">
              //     <span class="closebtn" @click="clsoutton()">&times;</span>
              //     <strong>Danger!</strong>A simple primary alert—check it out!
              //   </div>
              //   `
              // });
              document.getElementById('kaw').style.display='block';
            this.fetchpublication();
          })
      }
    },
    clsoutton()
    {
      document.getElementById('kaw').style.display='none';
    }
  }
};
</script>
<style>
.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>