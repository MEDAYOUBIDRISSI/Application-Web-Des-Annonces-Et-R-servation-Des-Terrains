<template>
    <div class="row">
        <div class="col-lg-4 col-sm-6" v-for="dataa in dataas" v-bind:key="dataa.id">
            <div class="g-post-classic">
                <aside class="sidebar">
                    <div class="widget">
                        <ul class="recent-photos" >
                            <br>
                            <li>
                                <a class="strip" :href="dataa[0].url" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
                                    <img :src="dataa[0].url" alt="" style="width:100px;height:40px;"></a>
                            </li>
                            <li v-for="image in dataa[1]" v-bind:key="image.id">
                                <a class="strip" :href="image.url" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
                                    <img :src="image.url" alt="" style="width:100px;height:40px;"></a>
                            </li>
                            <li>
                                <router-link :to="'addimg/'+dataa[0].id"><img src="images/add.png" alt="" style="height:40px;"></router-link>
                            </li>
                        </ul>
                    </div>
                </aside>
                <!-- <input type="radio" checked="checked" name="categorie" v-model="dataa.image.terrain_id" v-bind:value="dataa[0].id"> -->
                <div class="g-post-meta">
                    <div class="post-title">
                        <h4><a title="" href="#">{{dataa[0].nom}}</a></h4>
                        <div class="prod categories">
                            <span class="cat-heading" v-if="dataa[0].categorie_id === 3">Categorie De Terrain:
                                <a href="#" title="">11X11</a>
                            </span>
                            <span class="cat-heading" v-if="dataa[0].categorie_id === 2">Categorie De Terrain:
                                <a href="#" title="">7X7</a>
                            </span>
                            <span class="cat-heading" v-if="dataa[0].categorie_id === 1">Categorie De Terrain:
                                <a href="#" title="">5X5</a>
                            </span>
                        </div>
                        <div class="prod tags">
                            <span class="cat-heading" v-if="dataa[0].type_id === 1">Type de terrain:
                                <a href="#" title="">Gazzon</a>
                            </span>
                            <span class="cat-heading" v-if="dataa[0].type_id === 2">Type de terrain:
                                <a href="#" title="">Dssissa</a>
                            </span>
                        </div>
                        <div class="prod tags">
                            <span class="cat-heading">Les Reservations :
                                <router-link :to="'listreservation/'+dataa[0].id"><img src="images/list.png" alt="" style="height:30px;width:60px;"></router-link>
                            </span>
                        </div>
                        <span class="p-date">Crrée <a href="#" title="">in</a> {{dataa[0].created_at}} </span>
                    </div>	
                    <div class="g-post-ranking">
                        <a title="" href="#" class="likes"><i class="fa fa-heart-o"></i>Longeure : {{dataa[0].longeur}}</a>
                        <a title="" href="#" class="coments"><i class="fa fa-comment-o"></i>largeur : {{dataa[0].largeur}}</a>
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
      dataas:[],
      dataa:{
      	terrain: {
        id: '',
		user_id: '',
		categorie_id: '',
		type_id: '',
		pack_id: '',
		nom: '',
		longeur: '',
        largeur: '',
        created_at:'',
        url:''
      },
        image:[
        {
            id:'',
            url:'',
            terrain_id:'',
        }]},
      pagination: {},
      edit: false
    };
  },
  created() {
    this.fetchpublication();

  },

  methods: {
    fetchpublication() {
		let dta;
      fetch(`terrains`)
      .then(res => res.json())
      .then(res => { 
     this.dataas=res;
     
		 console.log(res);
      })
    },
    imagechanged(e)
     {
         var fileReader=new FileReader();
         fileReader.readAsDataURL(e.target.files[0]);
         fileReader.onload=(e)=>{
             this.dataa.image.url=e.target.result
         }
         console.log(this.dataa.image);

     }
  }
};
</script>