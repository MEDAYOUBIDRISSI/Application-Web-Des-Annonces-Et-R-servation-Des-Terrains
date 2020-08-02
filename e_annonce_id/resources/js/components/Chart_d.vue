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
                                <div class="messages">
                                    <h5 class="f-title"><i class="fa fa-line-chart"></i>Statistics <span class="more-options"><i class="fa fa-ellipsis-h"></i></span></h5>
                                    <div class="insight-box">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h2>Line Graph : the curve that shows the number of reservations for each terrain</h2>
                                            </div>
                                            <!-- <ul class="toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="#">Settings 1</a>
                                                    </li>
                                                    <li><a href="#">Settings 2</a>
                                                    </li>
                                                </ul>
                                                </li>
                                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>
                                            </ul> -->
                                            <div class="x_content">
                                                <line-chart :chart-data="datacollection" :height="100"></line-chart>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="insight-box">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h2>Pie Graph</h2>
                                            </div>
                                            <ul class="toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="#">Settings 1</a>
                                                    </li>
                                                    <li><a href="#">Settings 2</a>
                                                    </li>
                                                </ul>
                                                </li>
                                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>
                                            </ul>
                                            <div class="x_content">
                                                <line-chart :chart-data="datacollection" :height="100"></line-chart>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
    </section>
</template>

<script>

import LineChart from './LineChart.js'

export default {
  components: {
    LineChart
  },
  data(){
    return {
        users: [],
        rows:[],
        labels:[],
      datacollection: null
    }
  },
  created()
  {
      this.fetchUsers();
  },
  mounted () {
    this.fillData()
  },
  methods: {
    fetchUsers() {
      fetch(`charts/data`)
      .then(res => res.json())
      .then(res => { 
      this.users=res;
      
      this.rows=this.users.data.rows;
      this.labels=this.users.data.labels;
        console.log(this.rows);
         console.log(this.labels);
         this.fillData();
      })
      .catch(err => console.log(err));
	},
    fillData ()
    {
      console.log("lol"+this.rows);
      console.log(this.labels);
      this.datacollection = {
        labels: this.labels,
        datasets: [
          {
            label: 'Count',
            backgroundColor: '#1a75ff',
            data: this.rows
          },
        ]
      }
    }
  }
}
</script>

<style lang="css">
.small {
  max-width: 800px;
  /* max-height: 500px; */
  margin:  50px auto;
}
</style>