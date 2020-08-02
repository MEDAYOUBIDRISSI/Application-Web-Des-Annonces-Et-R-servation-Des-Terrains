<template>
    <div class="new-postbox">
        <figure v-for="user in users" v-bind:key="user.id">
            <img :src="user.url" alt="">
        </figure>
        <div class="newpst-input">
            <form @submit.prevent="addpublication">
                <textarea rows="2" placeholder="write something" v-model="publication.pub"></textarea>
                <div class="attachments">
                    <ul>
                        <li>
                            <i class="fa fa-image"></i>
                            <label class="fileContainer">
                                <input type="file" >
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
        publications: [],
      	publication: {
        id:'',
        titre:'',
        pub:'',
        user_id:'',
        date_creation:''
      },
      publication_id: '',
      pagination: {}, 
      edit: false
    };
  },

  created() {
    this.fetchUsers();
  },

  methods: {
    fetchUsers() {
		let dta;
      fetch(`api/userauth`)
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
            fetchpublication()
          })
          .catch(err => console.log(err));
      } 
    },
    clearForm() 
    {
      this.edit = false;
      this.publication.id = null;
      this.publication.publication_id = null;
      this.publication.titre = '';
      this.publication.pub = '';
    }
  }
};
</script>