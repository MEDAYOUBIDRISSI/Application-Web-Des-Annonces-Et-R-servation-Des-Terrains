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
                                <div class="groups">
                                    <span><i class="fa fa-users"></i> Reservations</span>
                                </div>
                                
                                <ul class="nearby-contct">
                                    <li v-for="reserver in reservers" v-bind:key="reserver.id">
                                        <div class="nearly-pepls">
                                            <figure>
                                                <a :href="reserver.url" title=""><img :src="reserver.url" alt=""></a>
                                            </figure>
                                            <div class="pepl-info">
                                                <h4><a href="time-line.html" title="">{{reserver.nom}} {{reserver.prenom}}</a></h4>
                                                <span>{{reserver.email}}</span>
                                                <a href="#" title="" class="add-butn" data-ripple="" style="">Terrain Reserver est : {{reserver.nomter}} , en {{reserver.date_reservation}} a {{reserver.heure}}H</a>
                                                
                                                <a href="#" title="" class="add-butn" data-ripple="" style="position:relative;top:15px;left:-25px;background-color:#f8f9fa;color:#343a40;">Create reservation en : {{reserver.created_at}}</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
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
      reservers: [],
      reserver: {
		nom: '',
		prenom: '',
		email:'',
		url:'',
        nomter:'',
        date_reservation:'',
        heure:'',
        created_at:''
      },
      pagination: {},
      edit: false
    };
  },

  created() {
    this.findes();
  },

  methods: {
    findes(){    
        fetch(`listreservationall_clube`)
        .then(res=>res.json())
        .then(res=>{
            this.reservers=res;
            //console.log(this.reservers);
        })
        .catch(err=>console.log(err));
    }
  }
};
</script>