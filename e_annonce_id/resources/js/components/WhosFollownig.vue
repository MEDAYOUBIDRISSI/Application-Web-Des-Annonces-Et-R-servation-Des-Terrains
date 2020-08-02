<template>
     <div class="widget stick-widget" >
            <h4 class="widget-title">Who's follownig</h4>
            <ul class="followers">
                <li v-for="user in users" v-bind:key="user.id">
                    <figure><img :src="user.url" alt=""></figure>
                    <div class="friend-meta">
                        <h4><a href="time-line.html" title="">{{user.nom}} {{user.prenom}}</a></h4>
                        <router-link :to="'/profile_auther/'+user.id" title="" class="underline">show profile</router-link>
                    </div>
                </li>
            </ul>
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
    this.fetchUsers();
  },

  methods: {
    fetchUsers() {
		let dta;
      fetch(`notfriend`)
      .then(res => res.json())
      .then(res => { 
		 this.users=res;
		 console.log(res);
      })
      .catch(err => console.log(err));
	}
  }
};
</script>