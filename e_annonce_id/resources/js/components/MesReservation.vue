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
                            <aside class="sidebar">
                                <div class="widget friend-list stick-widget" style="height:435px;overflow-x:hidden;overflow-y:scroll;">
                                    <h4 class="widget-title">Reservation</h4>
                                    <div id="searchDir"></div>
                                    <ul id="people-list" class="friendz-list">
                                        <li v-for="reserver in reservers" v-bind:key="reserver.id" style="margin-bottom:5px;">
                                            <div class="friendz-meta">
                                                <a href="#"> Clube Reserver in {{reserver.brand_name}} , Terrain : {{reserver.nom}}</a>
                                            </div>
                                            <div class="friendz-meta">
                                                <a href="#"> Heure Reservation a {{reserver.heure}}H , Date Reservation : {{reserver.date_reservation}}</a>
                                               <i><a>[{{reserver.created_at}}]</a></i>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </aside>
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
		id: '',
		date_reservation: '',
		brand_name:'',
		nom:'',
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
        fetch(`reseravtions/mesreservations`)
        .then(res=>res.json())
        .then(res=>{
            this.reservers=res;
            console.log(res);
        })
        .catch(err=>console.log(err));
    }
  }
};
</script>