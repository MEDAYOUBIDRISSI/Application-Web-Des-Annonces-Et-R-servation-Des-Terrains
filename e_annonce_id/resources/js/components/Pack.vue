<template>
    <section id="home_clube">
            <div class="gap gray-bg">
                <div class="container-fluid">
                    <div class="row" id="page-contents">
                        <div class="col-lg-3">
                        <aside class="sidebar static left">
                                <shortcuts></shortcuts>
                        </aside>
                        </div>
                        <div class="col-lg-8">
                            <div class="central-meta">
                                <div class="editing-info">
                                    <h5 class="f-title"><i class="ti-info-alt"></i> Create your pack</h5>
                                    <form @submit.prevent="addpack">
                                        <div class="form-group half">	
                                            <input type="text" id="input" required="required" v-model="pack.prix_matain">
                                            <label class="control-label" for="input">Prix de Matain</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="form-group half">	
                                            <input type="time" step='1' min="00:00:00" max="23:59:59" required="required" v-model="pack.heure_debut_matin">
                                            <label class="control-label" for="input">Heure de matain</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="form-group half">	
                                            <input type="text" id="input" required="required" v-model="pack.prix_soir">
                                            <label class="control-label" for="input">Prix de soire</label><i class="mtrl-select"></i>
                                        </div>
                                        <div class="form-group half">
                                            <input type="time" step='1' min="00:00:00" max="23:59:59" required="required" v-model="pack.heure_debut_soir">
                                            <label class="control-label" for="input">Heure de soire</label><i class="mtrl-select"></i>
                                        </div>
                                        <label style="opacity:0">{{pack.user_id=users[0].id}}</label>
                                        <div class="submit-btns">
                                            <button type="button" @click="clearForm()" class="mtr-btn"><span>Cancel</span></button>
                                            <button type="submit" class="mtr-btn"><span>Save</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="central-meta">
                                <div class="editing-interest">
                                    <h5 class="f-title"><i class="ti-bell"></i>Your Pack </h5>
                                    <div class="notification-box">
                                        <ul>
                                            <li v-for="pack in packs" v-bind:key="pack.id">
                                                <div class="notifi-meta">
                                                    <p>Pack {{pack.id}}</p>
                                                </div>
                                                <div class="notifi-meta">
                                                    <p>Heure de debut de matin : {{pack.heure_debut_matin}}H</p>
                                                    <span>Prix : {{pack.prix_matain}}DH</span>
                                                </div>
                                                <div class="notifi-meta">
                                                    <p>Heure de debut de soir : {{pack.heure_debut_soir}}H</p>
                                                    <span>Prix : {{pack.prix_soir}}DH</span>
                                                </div>
                                                <i class="edit fa fa-edit" @click="editpack(pack)" style="position:relative;left:75px;top:-83px;color:grey"></i>
                                                <i class="del fa fa-close"></i>
                                            </li>
                                        </ul>
                                    </div>
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
      pack_id: '',
      pagination: {},
      edit: false
    };
  },

  created() {
    this.fetchpacks();
    this.fetchUsers();
  },

  methods: {
    fetchpacks(page_url) {
      let vm = this;
       page_url = page_url || 'packs/clube'
      fetch(page_url)
      .then(res => res.json())
      .then(res => { 
         this.packs=res.data;
      })
      .catch(err => console.log(err));
    },
     addpack() {
      if (this.edit === false) {
        // Add
        fetch('api/packs', {
          method: 'post',
          body: JSON.stringify(this.pack),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
            this.clearForm();
            alert('pack Added');
            this.fetchpacks();
          })
          .catch(err => console.log(err));
      } 
      else 
      {
        //update
        fetch('api/packs', {
          method: 'put',
          body: JSON.stringify(this.pack),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
            this.clearForm();
            alert('pack Updated');
            this.fetchpacks();
          })
          .catch(err => console.log(err));
      }
    },
    editpack(pack)
    {
       this.edit=true;
       this.pack.id=pack.id;
       this.pack.pack_id=pack.id;
       this.pack.prix_matain=pack.prix_matain;
       this.pack.prix_soir=pack.prix_soir;
       this.pack.heure_debut_matin=pack.heure_debut_matin;
       this.pack.heure_debut_soir=pack.heure_debut_soir;
    },
    clearForm() 
    {
        this.edit = false;
        this.pack.id = null;
        this.pack.pack_id = null;
        this.pack.prix_matain='';
        this.pack.prix_soir='';
        this.pack.heure_debut_matin='';
        this.pack.heure_debut_soir='';
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
	}
  }
};
</script>