<template>
    <div class="widget friend-list stick-widget" >
		<h4 class="widget-title">Friends</h4>
		<div id="searchDir"></div>
		<ul id="people-list" class="friendz-list">
			<li v-for="user in users" v-bind:key="user.id">
				<figure>
					<img :src="user.url" alt="">
					<span class="status f-online"></span>
				</figure>
				<div class="friendz-meta">
					<router-link :to="'/profile_auther/'+user.id">{{user.nom}} {{user.prenom}}</router-link>
					<i><a href="#" class="__cf_email__" data-cfemail="">[{{user.email}}]</a></i>
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
      fetch(`friendlist`)
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