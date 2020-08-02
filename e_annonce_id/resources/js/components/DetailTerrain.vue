<template>
	<section>
		{{findeterrain($route.params.terrain_id)}}
		<div class="gap100">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="prod-detail">
							<div class="row">
								<div class="col-lg-6">
									<div class="central-meta">
									<ul class="photos">
										<li class="l-post">
											<a class="strip" :href="terrains[0].url" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
												<img :src="terrains[0].url" alt="">
											</a>
										</li>
										<li class="l-post" v-for="image in images" v-bind:key="image.id">
											<a class="strip" :href="image.url" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
												<img :src="image.url" alt="">
											</a>
										</li>
									</ul>
								</div>	
								</div>
								<div class="col-lg-6">
    								<div class="full-postmeta" v-for="terrain in terrains" v-bind:key="terrain.id">
										{{fetchimages(terrain.id)}}
										{{findepack(terrain.pack_id)}}
                                    	<h4>{{reserver.terrain_id=terrain.id}}-{{terrain.nom}}</h4>
										<i>INSPIRED LIVING</i>
                                    	<p v-for="pack in packs" v-bind:key="pack.id">
											Le prix d’une heure entre {{pack.heure_debut_matin}} et {{pack.heure_debut_soir}} est {{pack.prix_matain}}DH,
											<br>
											Le prix d’une heure entre {{pack.heure_debut_soir}} et {{pack.heure_debut_matin}} est {{pack.prix_soir}}DH.
                                    	</p>
   						
										   <router-link class="shopnow" :to="'/booknow/'+terrain.id">Book now</router-link>
										<div class="delivery-guide">
											<a href="#" title="">Size Guide</a>
											<a href="#" title="">Delivery & Return</a>
										</div>
										<a class="add_to_wishlist" href="#" title=""><i class="fa fa-heart-o"></i></a>
										<div class="prod categories">
											<span class="cat-heading" v-if="terrain.categorie_id === 3">Categorie De Terrain:
												<a href="#" title="">11X11</a>
											</span>
											<span class="cat-heading" v-if="terrain.categorie_id === 2">Categorie De Terrain:
												<a href="#" title="">7X7</a>
											</span>
											<span class="cat-heading" v-if="terrain.categorie_id === 1">Categorie De Terrain:
												<a href="#" title="">5X5</a>
											</span>
										</div>
										<div class="prod tags">
											<span class="cat-heading" v-if="terrain.type_id === 1">Type de terrain:
												<a href="#" title="">Gazzon</a>
											</span>
											<span class="cat-heading" v-if="terrain.type_id === 2">Type de terrain:
												<a href="#" title="">Dssissa</a>
											</span>
										</div>
										<div class="share">
											<span>share</span>
											<a href="#" title=""><i class="fa fa-facebook-square"></i></a>
											<a href="#" title=""><i class="fa fa-twitter-square"></i></a>
											<a href="#" title=""><i class="fa fa-google-plus-square"></i></a>
										</div>
										<div class="extras">
								             <a href="https://www.youtube.com/watch?v=MIbbtEjdYrc" title="" data-strip-group="mygroup" class="strip btn2" data-strip-options="width: 700,height: 450,youtube: { autoplay: 1 }"><i class="fa fa-play-circle"></i>Watch video</a>
							            </div><!-- play video btn -->
    								</div>
    							</div>
							</div>
							
							<div class="gap no-bottom">
								<div class="tab-section">
									<ul class="nav nav-tabs single-btn">
										 <li class="nav-item"><a class="" href="#desc" data-toggle="tab"></a></li>
										 <li class="nav-item"><a class="active" href="#additional" data-toggle="tab">Additional Information</a></li>
										 <li class="nav-item"><a class="" href="#review" data-toggle="tab"></a></li>
									</ul>

									<!-- Tab panes -->
									<div class="tab-content">
									  <div class="tab-pane  fade " id="desc" >
										
									  </div>
									  <div class="tab-pane active fade show" id="additional" v-for="terrain in terrains" v-bind:key="terrain.id">
										 <div class="aditional-inf">
										  	<!-- <h2 class="main-title">Shoes for you</h2> -->
											<!-- <p class="adition-info">
												Fusce vestibulum justo id varius tristique. Vivamus purus odio, interdum id massa ullamcorper, tempus.
											</p> -->
											<table class="table table-responsive adition">
												<tbody>
													<tr>
														<td class="bold">Longeur:</td>
														<td>{{terrain.longeur}} m</td>
													</tr>
													<tr>
														<td class="bold">Largeur:</td>
														<td>{{terrain.largeur}} m</td>
													</tr>
													<tr>
														<td class="bold">Categorie:</td>
														<td v-if="terrain.categorie_id === 3">11X11</td>
														<td v-if="terrain.categorie_id === 2">7X7</td>
														<td v-if="terrain.categorie_id === 1">5X5</td>
													</tr>
													<tr>
														<td class="bold">Type:</td>
														<td v-if="terrain.type_id === 1">Gazzon</td>
														<td v-if="terrain.type_id === 2">Dssissa</td>
													</tr>
												</tbody>
											</table>
										  </div>
									  </div>
									  <div class="tab-pane fade" id="review">
											
									  </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="central-meta">
						<div class="editing-info">
							<h5 class="f-title"><i class="ti-info-alt"></i> Edit Basic Information</h5>
							<form @submit.prevent="addreservation" >	
								<div class="form-group">	
									<input type="date" v-model="reserver.date_reservation" required="required"/>
									<label class="control-label" for="input">Date :</label><i class="mtrl-select"></i>
								</div>
								<div class="form-group">
									<a>Choisez time</a>
									<div class="we-video-info" style="height:60px;overflow-x:hidden;overflow-y:scroll;">
										<ul>
											<li class="social-media" v-for="heure in heures" v-bind:key="heure.id">
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
									<button type="button" class="btn btn-secondary" data-dismiss="modal"><span>Close</span></button>
        							<button type="submit" class="btn btn-primary"><span>Save changes</span></button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div> -->
	</section>
</template>

<script>
export default {
data() {
    return {
      images: [],
      image: {
		id: '',
		user_id:'',
		terrain_id:'',
		publication_id:'',
		url: '',
	  },
	  terrains: [],
      terrain: {
		id: '',
		user_id: '',
		categorie_id: '',
		type_id: '',
		pack_id: '',
		nom: '',
		longeur: '',
		largeur: '',
		url:''
	  },
	  packs: [],
      pack: {
		id: '',
		user_id: '',
		prix_matain: '',
		prix_soir: '',
		heure_debut_matin: '',
		heure_debut_soir: ''
	  },
	  heures: [],
      heure: {
		id: '',
		heure:''
      },
	  reservers: [],
      reserver: {
		id: '',
		date_reservation: '',
		user_id:'',
		terrain_id:'',
		heure_id:''
      },
	  image_id: '',
	  terrain_id: '',
	  pack_id: '',
	  id_1:'',
	  id_2:'',
	  id_3:'',
	  id_4:'',
      pagination: {},
      edit: false
    };
  },

  created() {
	//   this.findeterrain();
	//   this.fetchimages();
	  this.findepack();
	  this.fetchtype();
  },

  methods: {
    fetchimages(id) {
      fetch(`terrains/images/${id}`)
      .then(res => res.json())
      .then(res => { 
		 this.images=res.data;
		 //console.log(res.data);
      })
	},
	findeterrain(id){ 
        fetch(`terrains/detail/${id}`)
        .then(res=>res.json())
        .then(res=>{
            this.terrains=res.data;
            //console.log(res.data);
        })
	},
	findepack(id){ 
        fetch(`packs/terrain/${id}`)
        .then(res=>res.json())
        .then(res=>{
            this.packs=res.data;
           // console.log(res.data);
        })
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
	},
	fetchtype() {
      fetch(`heures`)
      .then(res => res.json())
      .then(res => { 
		 this.heures=res.data;
		 console.log(this.heures);
      })
	  }, 
  }
};
</script>