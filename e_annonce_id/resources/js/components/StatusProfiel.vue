<template>
<div>
    <input type="hidden" id="frina_pop" v-model="user.id">
    <div class="central-meta new-pst">
        <div class="new-postbox">
        <figure v-for="user in users" v-bind:key="user.id">
            <img :src="user.url" alt="">
            <span style="opacity:0">{{publication.user_id=user.id}}</span>
        </figure>
        <div class="newpst-input">
            <form @submit.prevent="addpublication">
                <textarea rows="2" placeholder="write something" v-model="publication.pub"></textarea>
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
                    <input type="text" required="required" v-model="publication.titre"/>
                    <label class="control-label" for="input">#Tags Or Title</label><i class="mtrl-select"></i>
                </div>
            </form>
        </div>
    </div>
    </div>
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
                        <div class="we-video-info">
                            <ul>
                                <!-- <li>
                                    <router-link to="" class="views" data-toggle="tooltip" title="views">
                                        <i class="fa fa-eye"></i>
                                        <ins>1.2k</ins>
                                    </router-link>
                                </li> -->
                                <!-- <li>
                                    <span class="comment" data-toggle="tooltip" title="Comments">
                                        <i class="fa fa-comments-o"></i>
                                        <ins>52</ins>
                                    </span> 
                                </li> -->
                                <li>
                                    <span class="like" data-toggle="tooltip" title="Edite" @click="editpublication(pub)">
                                        <i class="edit fa fa-edit"></i>
                                        <ins>edit</ins>
                                    </span>
                                </li>
                                <li>
                                    <span class="dislike" data-toggle="tooltip" title="Supprimer" @click="deletepublication(pub.id)">
                                        <i class="ti-trash"></i>
                                        <ins>supp</ins>
                                    </span>
                                </li>
                                <li class="social-media">
                                    <div class="menu">
                                        <router-link :to="'mesinteresse/'+pub.id" class="btn trigger"><i class="fa fa-eye"></i></router-link>
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
        </div>
    </div>
</div>
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
  created_v2() {
    

  },

  methods: {
     imagechanged(e)
     {
         var fileReader=new FileReader();
         fileReader.readAsDataURL(e.target.files[0]);
         fileReader.onload=(e)=>{
             this.publication.url=e.target.result
         }
         console.log(this.publication);

     }, 
    fetchUsers() {
		let dta;
      fetch(`indexall`)
      .then(res => res.json())
      .then(res => { 
		 this.users=res.data;
		// console.log(res.data);
      })
	  },
    fetchpublication() {
		let dta;
      fetch(`publication`)
      .then(res => res.json())
      .then(res => { 
		 this.publications=res.data;
		 //console.log(res.data);
      })
    },
    addpublication() {
       if (this.edit === false) {
        // Add
        fetch('api/publication', {
          method: 'post',
          body: JSON.stringify(this.publication),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
            this.clearForm();
            alert('publication Added');
            this.fetchpublication();
          })
      }
      else 
      {
        //update
        fetch('api/publication', {
          method: 'put',
          body: JSON.stringify(this.publication),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
            this.clearForm();
            alert('Publication Updated');
            this.fetchpublication();
          })
      }
    },
    editpublication(publication)
    {
       this.edit=true;
       this.publication.id=publication.id;
       this.publication.publication_id=publication.id;
       this.publication.titre=publication.titre;
       this.publication.pub=publication.pub;
       this.publication.url=publication.url;
    },
    deletepublication(id) {
      if (confirm('Are You Sure?')) {
        fetch(`api/publication/${id}`, {
          method: 'delete'
        })
          .then(res => res.json())
          .then(data => {
            alert('publication Removed');
            this.fetchpublication();
          })
      }
    },
    clearForm() 
    {
      this.edit = false;
      this.publication.id = null;
      this.publication.publication_id = null;
      this.publication.titre = '';
      this.publication.pub = '';
      this.publication.url = '';
    }
  }
};
</script>
