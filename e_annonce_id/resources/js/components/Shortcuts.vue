<template>
        <div class="widget">
            <h4 class="widget-title">Shortcuts</h4>
            <ul class="naves" v-for="user in users" v-bind:key="user.id">
                <li>
                    <!-- <i class="ti-clipboard"></i> -->
                    <router-link to="/home3">
                        All Clubs
                    </router-link>
                </li>
                <li v-if="user.type=='clube'">
                    <!-- <i class="ti-mouse-alt"></i> -->
                    <router-link to="/home4">
                        Our playgrounds
                    </router-link>
                </li>
                <li v-if="user.type=='clube'">
                    <!-- <i class="ti-files"></i> -->
                    <router-link to="/home5">
                        Add playground
                    </router-link>
                </li>
                <li v-if="user.type=='client'">
                    <!-- <i class="ti-user"></i> -->
                    <router-link to="/mesreservation">
                        My Reservations
                    </router-link>
                </li>
                <li v-if="user.type=='client'">
                    <!-- <i class="ti-image"></i> -->
                    <router-link to="/mesinteresse_all">
                        My Interested
                    </router-link>
                </li>
                <li v-if="user.type=='clube'">
                    <!-- <i class="ti-video-camera"></i> -->
                    <router-link to="/pack">
                        My Packs
                    </router-link>
                </li>
                <li v-if="user.type=='client'">
                    <!-- <i class="ti-comments-smiley"></i> -->
                    <router-link to="/mesinteresse_all/val">
                        My Interested valid
                    </router-link>
                </li>
                <li v-if="user.type=='client'">
                    <!-- <i class="ti-bell"></i> -->
                    <router-link to="/mesinteresse_allpasval">
                        My Interested Not Valid
                    </router-link>
                </li>
                <li v-if="user.type=='clube'">
                    <!-- <i class="ti-share"></i> -->
                    <router-link to="/allreservation">
                        All bookings
                    </router-link>
                </li>
                <li v-if="user.type=='clube'">
                    <!-- <i class="fa fa-bar-chart-o"></i> -->
                     <router-link to="/chartd">
                        Statistique
                    </router-link>
                </li>
                <li>
                    <i class="ti-power-off"></i>
                    <!-- <router-link href="#" to="/lougout" title="">Logout</router-link> -->
                    <a href="http://localhost:8000/logine">Logout</a>
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
      pack_id: '',
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
	}
  }
};
</script>