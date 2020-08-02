<template>
     <section>
         {{fetchpublication($route.params.terrain_id)}}
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
                                <div class="editing-info" v-for="terrain in terrains" v-bind:key="terrain.id">
                                    <h5 class="f-title"><i class="ti-info-alt"></i>Ajouter image de Terrain</h5>
                                    <form @submit.prevent="addimg"> 
                                        <div class="form-group">
                                            <h4><a title="" href="#">Nome de Terrain : {{terrain.nom}}</a></h4>
                                        </div>
                                        <!-- <div class="form-group">	
                                            <input type="file" required="required"  @change="imagechanged">
                                            
                                        </div> -->
                                        <div class="form-group half">	
                                            <div class="edit-phto" style="position: relative;left: 0px;bottom: -10px;">
                                                <i class="fa fa-camera-retro"></i>
                                                <label class="fileContainer">
                                                   Photo de Terrain
                                                <input type="file" required="required"  @change="imagechanged">
                                                </label>
                                            </div>
                                        </div>
                                        <label style="opacity:0">
                                                    <!-- <input type="radio" checked="checked" name="terrain_id" v-model="image.terrain_id" v-bind:value="terrain.id"><i class="check-box"></i> -->
                                                    {{image.terrain_id=terrain.id}}
                                                </label> 	
                                        <div class="submit-btns">
                                            <router-link to="/home4" class="mtr-btn"><span>Cancel</span></router-link>
                                            <button type="submit" class="mtr-btn"><span>Add</span></button>
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
  data() {
    return {
        terrains:[],
      	terrain: {
        id: '',
        user_id: '',
        categorie_id: '',
        type_id: '',
        pack_id: '',
        nom: '',
        longeur: '',
        largeur: '',
        url:'',
        created_at:''
      },
        images:[],
      	image: {
        id: '',
        url:'',
        terrain_id:''
      },
      pagination: {},
      edit: false
    };
  },
  created() {
    this.fetchpublication();

  },

  methods: {
    fetchpublication(id) {
		let dta;
      fetch(`ter/${id}`)
      .then(res => res.json())
      .then(res => { 
     this.terrains=res.data;

      })
    },
    imagechanged(e)
     {
         var fileReader=new FileReader();
         fileReader.readAsDataURL(e.target.files[0]);
         fileReader.onload=(e)=>{
             this.image.url=e.target.result
         }
         console.log(this.image);

     },
     addimg() {
        // Add
        fetch('api/imageterrain', {
          method: 'post',
          body: JSON.stringify(this.image),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
           // this.image.terrain_id='';
            this.image.url='';
            alert('image Added');
          })
    }, 
  }
};
</script>