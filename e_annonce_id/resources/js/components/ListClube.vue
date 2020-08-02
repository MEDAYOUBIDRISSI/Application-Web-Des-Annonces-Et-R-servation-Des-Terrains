<template>
<div>
    <div class="blog-sec right-pading">
        <!-- <div class="post-filter-sec">
            <form method="post" class="filter-form">
                <input type="post" placeholder="Search post">
                <button><i class="ti-search"></i></button>
            </form>
            <div class="purify">
                <span>filter by</span>
                <select>
                    <option>All Clubs</option>
                    <option>By Favouirtes</option>
                    <option>By Likes</option>
                </select>
                <select>
                    <option>Assending A-Z</option>
                    <option>Desending Z-A</option>
                    <option>Desending (date)</option>
                    <option>Asending (date)</option>
                </select>
                <a href="#" title="">purify</a>
            </div>
        </div> -->
        <div class="l-post" v-for="user in users" v-bind:key="user.id">
            <figure>
                <img :src="user.url" alt="">
                <ul class="blg-socials">
                    <li><a href="#" title="" class="facebook"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#" title="" class="twitter"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#" title="" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                </ul>
            </figure>
            <div class="l-post-meta">
                <h4><a href="#" title="">{{user.brand_name}}</a></h4>
                <div class="l-post-ranking">
                    <a class="admin" href="#" title="">admin</a>
                    <a class="pdate" href="#" title="">04-23-19</a>
                    <a class="time-post" href="#" title=""> -12 hours ago</a>
                </div>
                <p>
                    by imporving the physical layout of hospitals and medical facilities we can inhence and increase safety macnisum..
                    nous allons choisie ce clube pour voir tous les informations 
                </p>
                <!-- <div class="g-post-ranking">
                    <a class="likes" href="#" title=""><i class="fa fa-heart-o"></i>10 likes</a>
                    <a class="coments" href="#" title=""><i class="fa fa-comment-o"></i>5 comments</a>
                </div> -->
                
                
                <router-link :to="'detailclube/'+user.id">Read more</router-link>
            </div>
        </div>
        <button class="btn-view btn-load-more" onclick="functionedit()">Load More</button>
    </div>   
</div>
</template>


<script>
export default {
data() {
    return {
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
      user_id: '',
      pagination: {},
      edit: false
    };
  },

  created() {
    this.fetchusers();
  },

  methods: {
    fetchusers() {
      fetch(`api/clubs`)
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