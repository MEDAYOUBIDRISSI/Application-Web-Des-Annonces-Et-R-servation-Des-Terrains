<template>
     <section id="home_clube">
            <div class="gap gray-bg">
                <div class="container-fluid">
                    <div class="row" id="page-contents">
                        <div class="col-lg-2">
                        <aside class="sidebar static left">
                                <shortcuts></shortcuts>
                        </aside>
                        </div>
                        <div class="col-lg-9">
                            <div class="central-meta">
                                <!-- {{findeterrain($route.params.terrain_id)}} -->
                                <label style="opacity:0">{{ter=$route.params.terrain_id}}{{reserver.user_id=users[0].id}}</label>
                                <div class="editing-info" v-for="dataa in dataas" v-bind:key="dataa.id">
                                    <h5 class="f-title"><i class="ti-info-alt"></i>{{reserver.terrain_id=$route.params.terrain_id}}-{{dataa[0].nom}}</h5>
                                    <form @submit.prevent="addreservation">	
                                        <div class="form-group">	
                                            <input type="date" v-model="reserver.date_reservation" required="required"/>
                                             <label class="control-label" for="input">Date :</label><i class="mtrl-select"></i>
                                             <!-- <datepicker v-model="reserver.date_reservation" :format="dateFormat" style="display: block;"></datepicker> -->
                                        </div>
                                        <div class="form-group">
                                            <a>Choisez time</a>
                                            <div class="we-video-info" style="height:60px;overflow-x:hidden;overflow-y:scroll;">
                                                <ul>
                                                    <li class="social-media" v-for="heure in dataa[1]" v-bind:key="heure.id">
                                                        <div class="form-radio">
                                                            <div class="radio">
                                                                <label>
                                                                    <input type="radio" name="type" v-model="reserver.heure_id" v-bind:value="heure.id"><i class="check-box"></i>{{heure.heure}}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="submit-btns">
                                            <router-link class="btn btn-secondary" :to="'/detailterrain/'+$route.params.terrain_id"><span>Close</span></router-link>
                                            <button type="submit" class="btn btn-primary"><span>Save changes</span></button>
                                        </div>
                                    </form>
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

// data() {
//     return {
// 	  terrains: [],
//       terrain: {
// 		id: '',
// 		user_id: '',
// 		categorie_id: '',
// 		type_id: '',
// 		pack_id: '',
// 		nom: '',
// 		longeur: '',
// 		largeur: '',
// 		url:''
// 	  },
// 	  heures: [],
//       heure: {
// 		id: '',
// 		heure:''
//       },
// 	  reservers: [],
//       reserver: {
// 		id: '',
// 		date_reservation: '',
// 		user_id:'',
// 		terrain_id:'',
// 		heure_id:''
//       },
// 	  image_id: '',
// 	  terrain_id: '',
//       pagination: {},
//       edit: false
//     };
//   },

//   created() {
// 	  setTimeout(this.findeterrain, 4000)
// 	  //setTimeout(this.fetchtype, 4000)
//   },

//   methods: {
// 	findeterrain(){ 
//         fetch(`/api/terrains/detail/${reserver.terrain_id}`)
//         .then(res=>res.json())
//         .then(res=>{
//             this.terrains=res.data;
//             console.log(res.data);
//         })
// 	},
// 	addreservation() {
// 		// Add
// 		console.log(this.reserver);
//         fetch('api/reseravtions', {
//           method: 'post',
//           body: JSON.stringify(this.reserver),
//           headers: {
//             'content-type': 'application/json'
//           }
//         })
//           .then(res => res.json())
//           .then(data => {
//             this.reserver.id = null;
//             this.reserver.date_reservation = '';
// 			this.reserver.heure_id = '';
// 			this.reserver.terrain_id = '';
//             alert('Reservation Added');
//           })
// 	},
// 	fetchtype() {
//       fetch(`api/heures`)
//       .then(res => res.json())
//       .then(res => { 
// 		 this.heures=res.data;
// 		 console.log(this.heures);
//       })
// 	  } 
//   }
// };

data() {
    return {
      dataas:[],
      dataa:{
      	terrain: {
        id:'',
        user_id: '',
		categorie_id: '',
		type_id: '',
		pack_id: '',
		nom: '',
		longeur: '',
		largeur: '',
		url:''
       
      },
        heure:[
        {
        id: '',
		heure:''
        }]},
        reservers: [],
        reserver: {
		id: '',
		date_reservation: '',
		user_id:'',
		terrain_id:'',
		heure_id:''
      },
      users: [],
      	user: {
        id: ''
      },
      pagination: {},
      ter:'',
      edit: false
    };
  }, 

  created() {
      this.fetchUsers();
	  setTimeout(this.findeterrain, 2000)
	  //setTimeout(this.fetchtype, 4000)
  },

  methods: {
	findeterrain(){ 
        fetch(`terrains/detail2/`+this.ter)
        .then(res=>res.json())
        .then(res=>{
            this.dataas=res;
            console.log(res);
        })
    },
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
	addreservation() {
		// Add
		console.log(this.reserver);
        fetch('api/reseravtions', {
          method: 'post',
          body: JSON.stringify(this.reserver),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
            this.reserver.id = null;
            this.reserver.date_reservation = '';
			this.reserver.heure_id = '';
			this.reserver.terrain_id = '';
            alert('Reservation Added');
          })
	}
  }
};
</script>

