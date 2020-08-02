<template>
<div>
    <div class="central-meta new-pst">
        <div class="new-postbox">
          <figure v-for="user in users" v-bind:key="user.id">
              <img :src="user.url" alt="">
              <label style="opacity:0">{{dataa.publication.user_id=test_user}}</label>
          </figure>
          <div class="newpst-input">
              <form @submit.prevent="addpublication">
                  <textarea rows="2" placeholder="write something" v-model="dataa.publication.pub"></textarea>
                  <div class="attachments">
                      <ul>
                          <li>
                              <i class="fa fa-image"></i>
                              <label class="fileContainer">
                                  <input type="file" @change="imagechanged">
                              </label>
                          </li>
                          <li>
                              <button type="submit">Post</button>
                          </li>
                      </ul>
                  </div>
                  <div class="form-group">
                      <input type="text" required="required" v-model="dataa.publication.titre"/>
                      <label class="control-label" for="input">#Tags Or Title</label><i class="mtrl-select"></i>
                  </div>
              </form>
          </div>
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
                          <ins><router-link :to="'/profile_auther/'+image.id" title="">{{image.nom}} {{image.prenom}}</router-link></ins>
                          <span>published: {{dataa[0].created_at}}</span>
                      </div>
                      <div class="coment-head" style="position:absolute;left:80%;" v-for="image in dataa[1]" v-bind:key="image.id">
                            <button class="we-reply" style="border: none;background-color:#fdfdfd;" v-if="test!=100" title="Intéressé" @click="activpuplication(dataa[0].id)"><i class="fa fa-paper-plane"></i> Intéressé</button>
                      </div>
                      <div class="post-meta" >
                          <!-- <div v-for="image in dataa[1]" v-bind:key="image.id">
                              <img :src="image.url" alt="">
                          </div>  -->
                          <img :src="dataa[0].url" alt="">
                          <div class="description">
                              <p><a href="#" title="">{{dataa[0].titre}} !</a></p>
                              <p>{{dataa[0].pub}}</p>
                          </div>
                          <!-- <div class="we-video-info">
                              <ul>
                                  <li>
                                      <span class="views" data-toggle="tooltip" title="views">
                                          <i class="fa fa-eye"></i>
                                          <ins>1.2k</ins>
                                      </span>
                                  </li>
                                  <li>
                                      <span class="comment" data-toggle="tooltip" title="Comments">
                                          <i class="fa fa-comments-o"></i>
                                          <ins>52</ins>
                                      </span>
                                  </li>
                                  <li>
                                      <span class="like" data-toggle="tooltip" title="Edite" @click="editpublication(dataa[0])" disabled>
                                          <i class="ti-heart"></i>
                                          <ins>2.2k</ins>
                                      </span>
                                  </li>
                                  <li>
                                      <span class="dislike" data-toggle="tooltip" title="Supprimer" @click="deletepublication(dataa[0].id)" disabled>
                                          <i class="ti-heart-broken"></i>
                                          <ins>200</ins>
                                      </span>
                                  </li>
                                  <li class="social-media">
                                      <div class="menu">
                                          <div class="btn trigger"><i class="fa fa-share-alt"></i></div>
                                          <div class="rotater">
                                          <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-html5"></i></a></div>
                                          </div>
                                          <div class="rotater">
                                          <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-facebook"></i></a></div>
                                          </div>
                                          <div class="rotater">
                                          <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-google-plus"></i></a></div>
                                          </div>
                                          <div class="rotater">
                                          <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-twitter"></i></a></div>
                                          </div>
                                          <div class="rotater">
                                          <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-css3"></i></a></div>
                                          </div>
                                          <div class="rotater">
                                          <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-instagram"></i></a>
                                          </div>
                                          </div>
                                          <div class="rotater">
                                          <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-dribbble"></i></a>
                                          </div>
                                          </div>
                                          <div class="rotater">
                                          <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-pinterest"></i></a>
                                          </div>
                                          </div>

                                      </div>
                                  </li>
                              </ul>
                          </div> -->
                      </div>
                  </div>
              </div>
          </div>  
          <!-- <div class="central-meta item" v-for="pub in pes" v-bind:key="pub.id" style="opacity:0">
            <div class="user-post">
                <div class="friend-info" >
                    <figure v-for="user in users" v-bind:key="user.id">
                        <img :src="user.url" alt="">
                    </figure>
                    <div class="friend-name" v-for="user in users" v-bind:key="user.id">
                        <ins><a href="time-line.html" title="">{{user.nom}} {{user.prenom}}</a></ins>
                        <span>published: {{pub.created_at}}</span><span>{{dataa.publication.user_id=user.id}}</span>
                    </div>
                    <div class="post-meta" >
                            <img :src="pub.url" alt="">
                        
                        <div class="description">
                            <p><a href="#" title="">{{pub.titre}} !</a></p>
                            <p>{{pub.pub}}</p>
                        </div>
                        <div class="we-video-info">
                            <ul>
                                <li>
                                    <span class="views" data-toggle="tooltip" title="views">
                                        <i class="fa fa-eye"></i>
                                        <ins>1.2k</ins>
                                    </span>
                                </li>
                                <li>
                                    <span class="comment" data-toggle="tooltip" title="Comments">
                                        <i class="fa fa-comments-o"></i>
                                        <ins>52</ins>
                                    </span>
                                </li>
                                <li>
                                    <span class="like" data-toggle="tooltip" title="Edite" @click="editpublication(pub)">
                                        <i class="ti-heart"></i>
                                        <ins>2.2k</ins>
                                    </span>
                                </li>
                                <li>
                                    <span class="dislike" data-toggle="tooltip" title="Supprimer" @click="deletepublication(pub.id)">
                                        <i class="ti-heart-broken"></i>
                                        <ins>200</ins>
                                    </span>
                                </li>
                                <li class="social-media">
                                    <div class="menu">
                                        <div class="btn trigger"><i class="fa fa-share-alt"></i></div>
                                        <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-html5"></i></a></div>
                                        </div>
                                        <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-facebook"></i></a></div>
                                        </div>
                                        <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-google-plus"></i></a></div>
                                        </div>
                                        <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-twitter"></i></a></div>
                                        </div>
                                        <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-css3"></i></a></div>
                                        </div>
                                        <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-instagram"></i></a>
                                        </div>
                                        </div>
                                        <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-dribbble"></i></a>
                                        </div>
                                        </div>
                                        <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-pinterest"></i></a>
                                        </div>
                                        </div>

                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>
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
        pes:[],
      	pe: {
        id:'',
        titre:'',
        pub:'',
        user_id:'',
        url:'',
        date_creation:'',
        created_at:'',
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
      acps: [],			
        acp: {
        id: '',
		date_val: '',
		valide: '',
        publication_id: '',
        user_id:''
      },
      pagination: {},
      test:'',
      test_user:'',
      edit: false
    };
  }, 
  created() {
    this.fetchpublication();
    this.fetchpublication_v2();
    this.fetchUsers();
  },
  methods: {
     imagechanged(e)
     {
         var fileReader=new FileReader();
         fileReader.readAsDataURL(e.target.files[0]);
         fileReader.onload=(e)=>{
             this.dataa.publication.url=e.target.result
         }
         console.log(this.dataa.publication);

     },
    fetchpublication() {
		let dta;
      fetch(`publication/all`)
      .then(res => res.json())
      .then(res => { 
       this.dataas=res;
		 console.log(res);
      })
    },
    addpublication() {
       if (this.edit === false) {
        // Add
        fetch('api/publication', {
          method: 'post',
          body: JSON.stringify(this.dataa.publication),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
            this.edit = false;
            this.dataa.publication.id = null;
            this.dataa.publication.publication_id = null;
            this.dataa.publication.titre = '';
            this.dataa.publication.pub = '';
            this.dataa.publication.url = '';
            alert('publication Added');
            this.fetchpublication();
          })
      }
    },
    clearForm() 
    {
      this.edit = false;
      this.dataa.publication.id = null;
      this.dataa.publication.publication_id = null;
      this.dataa.publication.titre = '';
      this.dataa.publication.pub = '';
      this.dataa.publication.url = '';
    },
    activpuplication(pub) {
		let dta;
      fetch(`acp/${pub}`)
      .then(res => res.json())
      .then(res => { 
       this.acps=res.data;
        alert('publication Est interesse');
        this.fetchpublication();
      })
    },
    fetchpublication_v2() {
		let dta;
      fetch(`publication`)
      .then(res => res.json())
      .then(res => { 
		 this.pes=res.data;
		 //console.log(res.data);
      })
    }, 
    fetchUsers() {
		let dta;
      fetch(`indexall`)
      .then(res => res.json())
      .then(res => { 
         this.users=res.data;
         this.test_user=this.users[0].id;
         if(this.users[0].type=="clube")
         {
             this.test=100;
         }
		// console.log(res.data);
      })
	  }
  }
};
</script>
