<template>
    <div class="feature-photo" >
			<figure v-for="user in users" v-bind:key="user.id"><img :src="user.coverture" alt=""></figure>
			<div class="add-btn">
				<span>1205 followers</span>
				<a href="#" title="" data-ripple="">Add Friend</a>
			</div>
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
									<a class="active" href="#" title="" data-ripple="">time line</a>
									<a class="" href="#" title="" data-ripple="">Photos</a>
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
      fetch(`indexall`)
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
	}
  }
};
</script>