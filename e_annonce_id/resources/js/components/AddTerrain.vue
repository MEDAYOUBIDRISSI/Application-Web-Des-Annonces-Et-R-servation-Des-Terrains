<template>
    <div class="central-meta">
        <div class="editing-info">
            <h5 class="f-title"><i class="ti-info-alt"></i>Add Terrain</h5>

            <form @submit.prevent="addterrain">

                <div class="form-group">	
                    <input type="text" id="input" v-model="terrain.nom" required="required">
                    <label class="control-label" for="input">Name</label><i class="mtrl-select"></i>
                </div>
                <div class="form-group">	
                    <input type="text" id="input" v-model="terrain.longeur" required="required">
                    <label class="control-label" for="input">Longeur</label><i class="mtrl-select"></i>
                </div>
                <div class="form-group">	
                    <input type="text" id="input" v-model="terrain.largeur" required="required">
                    <label class="control-label" for="input">Largeur</label><i class="mtrl-select"></i>
                </div>
                <br>
                
                <div class="dob">
                    <div class="form-radio">
                      <a class="f-title" href="#">Categorie de Terrain</a>
											  <div class="radio" v-for="categorie in categories" v-bind:key="categorie.id">
                          <label>
                            <input type="radio" checked="checked" name="categorie" v-model="terrain.categorie_id" v-bind:value="categorie.id"><i class="check-box"></i>{{categorie.libelle}}
                          </label>
											  </div>
										</div>
                </div>
                <br>
                <div class="dob">
                    <div class="form-radio">
                      <a class="f-title" href="#">Type de Terrain</a>
											  <div class="radio" v-for="type in types" v-bind:key="type.id">
                          <label>
                            <input type="radio" checked="checked" name="type" v-model="terrain.type_id" v-bind:value="type.id"><i class="check-box"></i>{{type.libelle}}
                          </label>
											  </div>
										</div>
                </div>
                <br>
                <div class="dob">
                    <div class="form-radio">
                      <a class="f-title" href="#">Pack de Terrain</a>
											  <div class="radio" v-for="pack in packs" v-bind:key="pack.id" style="margin-left: 30px;">
                          <label>
                            <input type="radio" checked="checked" name="pack" v-model="terrain.pack_id" v-bind:value="pack.id"><i class="check-box"></i><p>Le prix d’une heure entre {{pack.heure_debut_matin}} et {{pack.heure_debut_soir}} est {{pack.prix_matain}},
											      <br>
											      Le prix d’une heure entre {{pack.heure_debut_soir}} et {{pack.heure_debut_matin}} est {{pack.prix_soir}}.</p>
                          </label>
											  </div>
										</div>
                </div>
                <div class="form-group half">	
                    <div class="edit-phto" style="position: relative;left: 0px;bottom: -10px;">
                        <i class="fa fa-camera-retro"></i>
                        <label class="fileContainer">
                            Photo de Terrain
                        <input type="file" required="required"  @change="imagechanged">
                        </label>
                    </div>
                </div>
                <div class="submit-btns">
                    <button type="button" class="mtr-btn"><span>Cancel</span></button>
                    <button type="submit" class="mtr-btn"><span>Add</span></button>
                </div>
                <figure style="opacity:0" v-for="user in users" v-bind:key="user.id">
                    <span>{{terrain.user_id=user.id}}</span>
                </figure>
            </form>
        </div>
    </div>
</template>

<script>
export default {
  data() {
    return {
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
      categories: [],
      	categorie: {
        id: '',
        libelle: '',
        description: ''
      },
      types: [],
      	type: {
        id: '',
        libelle: '',
        description: ''
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
      terrain_id:'',
      pagination: {},
      edit: false 
    };
  },
  created() {
      this.fetchtype();
      this.fetchcategorie();
      this.fetchpack();
      this.fetchUsers();
  },

  methods: {
    imagechanged(e)
     {
         var fileReader=new FileReader();
         fileReader.readAsDataURL(e.target.files[0]);
         fileReader.onload=(e)=>{
             this.terrain.url=e.target.result
         }
         console.log(this.terrain);

     },
    addterrain() {
       if (this.edit === false) {
        // Add
        fetch('api/terrains', {
          method: 'post',
          body: JSON.stringify(this.terrain),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
            this.clearForm();
            alert('terrain Added');
          })
      }
      else 
      {
        //update
        fetch('api/terrain', {
          method: 'put',
          body: JSON.stringify(this.terrain),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
            this.clearForm();
            alert('terrain Updated');
            this.fetchterrain();
          })
      }
    }, 
    fetchcategorie() {
      fetch(`api/categories`)
      .then(res => res.json())
      .then(res => { 
		 this.categories=res.data;
		 console.log(this.categories);
      })
	  }, 
    fetchtype() {
      fetch(`api/types`)
      .then(res => res.json())
      .then(res => { 
		 this.types=res.data;
		 console.log(this.types);
      })
	  }, 
    fetchpack() {
      fetch(`packs/clube`)
      .then(res => res.json())
      .then(res => { 
		 this.packs=res.data;
		 console.log(this.packs);
      })
    },
    fetchUsers() {
		let dta;
      fetch(`indexall`)
      .then(res => res.json())
      .then(res => { 
		 this.users=res.data;
		// console.log(res.data);
      })
	  },
    clearForm() 
    {
      this.edit = false;
      this.terrain.id = null;
      this.terrain.nom = null;
      this.terrain.longeur = '';
      this.terrain.largeur = '';
      this.terrain.pack_id = '';
      this.terrain.type_id = '';
      this.terrain.categorie_id = '';
      this.terrain.url = '';
    }
  }
};
</script>