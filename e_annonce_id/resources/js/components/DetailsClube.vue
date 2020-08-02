<template>
<div>
    <!-- {{findes($route.params.clube_id)}}
    {{fetchusers($route.params.clube_id)}} -->
    {{user_1=$route.params.clube_id}}
    <section v-for="user in users" v-bind:key="user.id">
    <div class="gap ext">
        <div class="container">
            <div class="row">
                <div class="offset-lg-1 col-lg-10">
                    <div class="detail-page">
                        <div class="detail-top">
                            <img :src="user.coverture" alt="">
                            <div class="connect-with">
                                <ul class="social-connect">
                                    <li class="rs">
                                        <i class="fa fa-rss"></i>
                                        <span>
                                            <a title="" href="#">Subscribe</a>
                                            <i>to Rss Feed</i>
                                        </span>
                                    </li>
                                    <li class="twit">
                                        <i class="fa fa-twitter"></i>
                                        <span>
                                            <a title="" href="#">Follow Us</a>
                                            <i>on twitter</i>
                                        </span>
                                    </li>
                                    <li class="fb">
                                        <i class="fa fa-facebook"></i>
                                        <span>
                                            <a title="" href="#">Find Us</a>
                                            <i>on Facebook</i>
                                        </span>
                                    </li>
                                    <li class="googl">
                                        <i class="fa fa-google-plus"></i>
                                        <span>
                                            <a title="" href="#">Find Us</a>
                                            <i>on Google plus</i>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="detail-meta">
                            <h2>{{user.brand_name}}</h2>
                            
                            <div class="post-time">
                                <div class="author-thumb">
                                <img :src="user.url" alt="" style="height:40px;width:40px;">
                                <span><a href="#" title="">by {{user.nom}} {{user.prenom}}</a></span>
                            </div>
                                <span class="post-date">
                                    <i class="fa fa-calendar"></i>
                                    <a title="" href="#">12 July 2016</a>
                                </span>
                                <span class="coments">
                                    <i class="fa fa-comments"></i>
                                    <a title="" href="#">25</a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="central-meta">
                        <div class="about">
                            <div class="personal">
                                <h5 class="f-title"><i class="ti-info-alt"></i> Personal Info</h5>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                            </div>
                            <div class="d-flex flex-row mt-2">
                                <ul class="nav nav-tabs nav-tabs--vertical nav-tabs--left" >
                                    <li class="nav-item">
                                        <a href="#basic" class="nav-link active" data-toggle="tab" >Basic info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#location" class="nav-link" data-toggle="tab" >location</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#work" class="nav-link" data-toggle="tab" >work and education</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#interest" class="nav-link" data-toggle="tab"  >interests</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#lang" class="nav-link" data-toggle="tab" >languages</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="basic" >
                                        <ul class="basics">
                                            <li><i class="ti-user"></i>{{user.nom}} {{user.prenom}}</li>
                                            <li><i class="ti-map-alt"></i>{{user.adresse}}</li>
                                            <li><i class="ti-mobile"></i>{{user.tel}}</li>
                                            <li><i class="ti-email"></i><a href="" class="" data-cfemail="">{{user.email}}</a></li>
                                            <li><i class="ti-world"></i>www.yoursite.com</li>
                                        </ul>
                                    </div>

                                    <div class="tab-pane fade" id="location" role="tabpanel">
                                            <div>
                                                <GmapMap
                                                    v-bind:center="{lat:parseFloat(user.laltitude), lng:parseFloat(user.longitude)}"
                                                    v-bind:zoom="16"
                                                    map-type-id="terrain"
                                                    style="width: 700px; height: 220px"
                                                >
                                                <GmapMarker
                                                    v-bind:key="index"
                                                    v-for="(m, index) in markers"
                                                    v-bind:position="m.position"
                                                    v-bind:clickable="true"
                                                />
                                                </GmapMap>
                                            </div>
                                    </div>
                                    <div class="tab-pane fade" id="work" role="tabpanel">
                                        <div>
                                            
                                            <a href="#" title="">Envato</a>
                                            <p>work as autohr in envato themeforest from 2013</p> 
                                            <ul class="education">
                                                <li><i class="ti-facebook"></i> BSCS from Oxford University</li>
                                                <li><i class="ti-twitter"></i> MSCS from Harvard Unversity</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="interest" role="tabpanel">
                                        <ul class="basics">
                                            <li>Footbal</li>
                                            <li>internet</li>
                                            <li>photography</li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade" id="lang" role="tabpanel">
                                        <ul class="basics">
                                            <li>english</li>
                                            <li>french</li>
                                            <li>spanish</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <div class="central-meta">
                        <div class="central-meta">
                        <div class="about">
                            <div class="personal">
                                <h5 class="f-title"><i class="ti-info-alt"></i>Terrains</h5>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    ..et tout les terrains par apport au categorie..maintenant on va choisir le terrain qui nous voulons reservé
                                </p>
                            </div>
                        </div>
                    </div>
                        <div class="frnds">
                            <ul class="nav nav-tabs">
                                    <li class="nav-item"><a class="active" href="#11" data-toggle="tab">11 X 11</a></li>
                                    <li class="nav-item"><a class="" href="#7" data-toggle="tab">7 X 7</a></li>
                                    <li class="nav-item"><a class="" href="#5" data-toggle="tab">5 X 5</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active fade show " id="11" >
                                    <div v-for="terrain in terrains" v-bind:key="terrain.id">
                                    <ul class="nearby-contct" v-if="terrain.categorie_id === 3">
                                        <li>
                                            <div class="nearly-pepls">
                                                <figure >
                                                    <a href="#" title=""><img :src="terrain.url" alt=""></a>
                                                </figure>
                                                <div class="pepl-info">
                                                    <h4><a href="time-line.html" title="">{{terrain.nom}}</a></h4>
                                                    <br>
                                                    <span v-if="terrain.type_id === 1">
                                                    <a href="#" title="">Type Terrain : </a> Gazzon
                                                    </span>
                                                    <span v-else-if="terrain.type_id === 2">
                                                    <a href="#" title="">Type Terrain : </a> Dssissa
                                                    </span>
                                                    <router-link class="add-butn" :to="'/detailterrain/'+terrain.id" style="background-color: green;position:relative;left:1px;">Detaile de Terrain</router-link>
                                                    <router-link class="add-butn" :to="'/booknow/'+terrain.id">Book now</router-link>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>	
                                    </div>
                                    <div class="lodmore"><button class="btn-view btn-load-more"></button></div>
                                </div>
                                <div class="tab-pane fade" id="7" >
                                    <div v-for="terrain in terrains" v-bind:key="terrain.id">
                                    <ul class="nearby-contct" v-if="terrain.categorie_id === 2">
                                        <li>
                                            <div class="nearly-pepls">
                                                <figure >
                                                    <a href="#" title=""><img :src="terrain.url" alt=""></a>
                                                </figure>
                                                <div class="pepl-info">
                                                    <h4><a href="time-line.html" title="">{{terrain.nom}}</a></h4>
                                                    <br>
                                                    <span v-if="terrain.type_id === 1">
                                                    <a href="#" title="">Type Terrain : </a> Gazzon
                                                    </span>
                                                    <span v-else-if="terrain.type_id === 2">
                                                    <a href="#" title="">Type Terrain : </a> Dssissa
                                                    </span>
                                                    <router-link class="add-butn" :to="'/detailterrain/'+terrain.id" style="background-color: green;position:relative;left:1px;">Detaile de Terrain</router-link>
                                                    <router-link class="add-butn" :to="'/booknow/'+terrain.id">Book now</router-link>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>	
                                    </div>
                                    <button class="btn-view btn-load-more"></button>
                                </div>
                                <div class="tab-pane fade" id="5" >
                                    <div v-for="terrain in terrains" v-bind:key="terrain.id">
                                    <ul class="nearby-contct" v-if="terrain.categorie_id === 1">
                                        <li>
                                            <div class="nearly-pepls">
                                                <figure style="width:20px;">
                                                    <a href="#" title=""><img :src="terrain.url" alt=""></a>
                                                </figure>
                                                <div class="pepl-info">
                                                    <h4><a href="#" title="">{{terrain.nom}}</a></h4>
                                                    <br>
                                                    <span v-if="terrain.type_id === 1">
                                                    <a href="#" title="">Type Terrain : </a> Gazzon
                                                    </span>
                                                    <span v-else-if="terrain.type_id === 2">
                                                    <a href="#" title="">Type Terrain : </a> Dssissa
                                                    </span>
                                                    
                                                    <router-link class="add-butn" :to="'/detailterrain/'+terrain.id" style="background-color: green;position:relative;left:1px;">Detaile de Terrain</router-link>
                                                    <router-link class="add-butn" :to="'/booknow/'+terrain.id">Book now</router-link>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>	
                                    </div>		
                                    <button class="btn-view btn-load-more"></button>
                                </div>
                            </div>
                        </div>
                    </div>	
                </div>
            </div>
        </div>
    </section>
    
</div>
</template>


<script>
export default {
  data() {
    return {
      markers:[
          {
              position:{lat:31.633090798026533,lng:-8.001358523571753}
          }
      ],
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
      terrain_id: '',
      pagination: {},
      user_1:'',
      user_2:'',
      edit: false
    };
  },

  created() {
    setTimeout(this.findes,1000);
    setTimeout(this.fetchusers,2000);
  },

  methods: {
    findes(){    
        fetch(`terrains/`+this.user_1)
        .then(res=>res.json())
        .then(res=>{
            this.terrains=res.data;
            console.log(res.data);
        })
        .catch(err=>console.log(err));
    },
    fetchusers() {
      fetch(`clubs/`+this.user_1)
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