<template>
  <div class="container" id="app">
    <h3 class="animated infinite flash slow">Hello World I'am App.vue</h3>
    <div>
      <form action="./api/articles" method="POST" @submit.prevent="addArticle()" id="article-form">
        <div class="form-row align-items-center">
          <div class="col-sm-3 my-1">
            <label for="inputTitle" class="sr-only">Title</label>
            <input type="text" class="form-control" id="inputTitle" placeholder="Title of article" v-model="title">
          </div>
          <div class="col-sm-3 my-1">
            <label for="inputContent" class="sr-only">Content</label>
            <input type="text" class="form-control" id="inputContent" placeholder="Content of article" v-model="content">
          </div>
          <div class="col-auto my-1">
            <button class="btn btn-primary" type="submit"><i class="fa fa-rocket" aria-hidden="true"></i> Submit</button>
          </div>
        </div>
      </form>
      <div>
        <!-- <button @click="create">Create</button> -->
      </div>
    </div>

    <table class="table table-bordered">
      <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Article Content</th>
        <th colspan="2">Action <i class="fa fa-hand-lizard-o" aria-hidden="true"></i> </th>
      </tr>
      <crud-component
        v-for="article in articles"
        v-bind="article"
        :key="article.id"
        @delete="del"
        @edit="edit"
      ></crud-component>
    </table>
    <modal-edit
        @update="update"
    ></modal-edit>
  </div>
</template>

<script>

function Article({id, title, content}) {
  this.id = id;
  this.title = title;
  this.content = content;
}

import CrudComponent from './Crud.vue';
import ModalEdit from './Modal.vue';
import { read } from 'fs';

export default {
  data() {
    return {
      articles: [],
      title: '',
      content: ''
    }
  },
  methods: {
    read() {
      window.axios.get(`/api/articles`).then(({data}) => {
        data.forEach(article => {
          this.articles.push(new Article(article));
        });
      });
    },
    addArticle() {
      window.axios.post('./api/articles', {
        title: this.title,
        content: this.content
      }).then(({data}) => {
        this.articles.push(new Article(data));
        this.title = '';
        this.content = '';
        console.log(new Article(data));
      });
    },
    // create() {
    //   window.axios.get('/api/articles/create').then(({data}) => {
    //     this.articles.push(new Article(data));
    //   });
    // },
    del(id) {
      window.axios.delete(`/api/articles/${id}`).then(() => {
        let index = this.articles.findIndex(article => article.id === id);
        this.articles.splice(index, 1);
      });
    },
    edit(id, title, content) {
      window.$('#exampleModal').on('show.bs.modal', function (e) { 
        window.$('.editId').val(id);
        window.$('.editTitle').val(title);
        window.$('.editContent').val(content);
      });
    },
    update(id, title, content) {
      window.axios.put(`/api/articles/${id}`, {title: title, content: content}).then(({data}) => {
        // this.articles.find(article => article.id === id).content = content;
        console.log(new Article(data));
        // this.articles.push(new Article(data));
        this.read();
        
        window.$("#exampleModal").modal('hide');
      });
    }
  },
  mounted() {
    // console.log('component Mounted');
  },
  created() {
    this.read();
  },
  components: {
    CrudComponent,
    ModalEdit
  }
}
</script>