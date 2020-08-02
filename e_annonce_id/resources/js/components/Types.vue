<template>
  <div>
    <h1>typesssssssssssssssss</h1>
        <form @submit.prevent="addCategorie" class="mb-3">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Libelle" v-model="categorie.libelle">
      </div>
      <div class="form-group">
        <textarea class="form-control" placeholder="Description" v-model="categorie.description"></textarea>
      </div>
      <button type="submit" class="btn btn-light btn-block">Save</button>
      <router-link to="/nav">link</router-link>
      <router-view></router-view>
    </form>
      <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchCategories(pagination.prev_page_url)">Previous</a></li>

        <li class="page-item disabled"><a class="page-link text-dark" href="#">Page {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>
    
        <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchCategories(pagination.next_page_url)">Next</a></li>
      </ul>
    </nav>
      <div class="card card-body" v-for="categorie in categories" v-bind:key="categorie.id" >
        <h3>{{ categorie.libelle }}</h3>
        <p>{{ categorie.description }}</p>
        <hr>
        <button @click="editCategorie(categorie)" class="btn btn-warning mb-2">Edit</button>
        <button @click="deleteCategorie(categorie.id)" class="btn btn-danger">Delete</button>
      </div>
  </div>
</template> 

<script>
export default {
  data() {
    return {
      categories: [],
      categorie: {
        id: '',
        libelle: '',
        description: ''
      },
      categorie_id: '',
      pagination: {},
      edit: false
    };
  },

  created() {
    this.fetchCategories();
  },

  methods: {
    fetchCategories(page_url) {
      let vm = this;
       page_url = page_url || 'api/categories'
      fetch(page_url)
      .then(res => res.json())
      .then(res => { 
         this.categories=res.data;
         vm.makePagination(res.meta, res.links);
      })
      .catch(err => console.log(err));
    },
    makePagination(meta,links){
      let pagination = {
        current_page:meta.current_page,
        last_page:meta.last_page,
        next_page_url:links.next,
        prev_page_url:links.prev
      };
        this.pagination=pagination;
    },
    deleteCategorie(id) {
      if (confirm('Are You Sure?')) {
        fetch(`api/categories/${id}`, {
          method: 'delete'
        })
          .then(res => res.json())
          .then(data => {
            alert('Categorie Removed');
            this.fetchCategories();
          })
          .catch(err => console.log(err));
      }
    },
     addCategorie() {
      if (this.edit === false) {
        // Add
        fetch('api/categories', {
          method: 'post',
          body: JSON.stringify(this.categorie),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
            this.clearForm();
            alert('Categorie Added');
            this.fetchCategories();
          })
          .catch(err => console.log(err));
      } 
      else 
      {
        //update
        fetch('api/categories', {
          method: 'put',
          body: JSON.stringify(this.categorie),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
            this.clearForm();
            alert('Categorie Updated');
            this.fetchCategories();
          })
          .catch(err => console.log(err));
      }
    },
    editCategorie(categorie)
    {
       this.edit=true;
       this.categorie.id=categorie.id;
       this.categorie.categorie_id=categorie.id;
       this.categorie.libelle=categorie.libelle;
       this.categorie.description=categorie.description;
    },
    clearForm() 
    {
      this.edit = false;
      this.categorie.id = null;
      this.categorie.categorie_id = null;
      this.categorie.libelle = '';
      this.categorie.description = '';
    }
  }
};
</script>