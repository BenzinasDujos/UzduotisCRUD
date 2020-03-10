<template>

  <div class ="row">
      <div class="cell-lg-6"></div>
          <h1 class="center-text">Form</h1>
      <div class="form-group">
          <label>Title</label>
          <input v-model="title" type="text" placeholder="Enter Title"/>
      </div>
      <div class="form-group">
          <label>Link</label>
          <input v-model="link" type="text" placeholder="Enter Link"/>
      </div>
      <div class="form-group">
          <button class="button success">Submit data</button>
    </div>
      <div class="cell-lg-6"></div>
      <table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Link</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>1</td>
        <td>Bill</td>
        <td>Gates</td>
        <td>
          <button @click="getOne()" class="button success outline">Edit</button>
        </td>
        <td>
          <button @click="deleteOne()" class="button success outline">Delete</button>
        </td>
    </tr>

    </tbody>
</table>
  </div>

</template>

<script>
import axios from 'axios'

/* eslint-disable */
export default {
  name: 'App',
  data:()=>({
    id:0,
    title:'',
    link:'',
    movies:[]
  }),
  mounted(){
    this.getAll();
  },
  methods:{
    getAll(){
      axios.get(`http://127.0.0.1/api`)
      .then((res)=>
      this.movies = res.data
      )
    },
    getOne(id){
      axios.get(`http://127.0.0.1/api/${id}`)
      .then((res)=>{
        this.movies = res.data.id;
        this.title = res.data.title;
        this.link = res.data.link;
      }

      )
    },
      deleteOne(id){
      axios.delete(`http://127.0.0.1/api/${id}`)
      .then((res)=>{
        this.getAll();
      })
      }
      ,
      editOne(id){
      axios.put(`http://127.0.0.1/api/${id}`, {title:this.title, link:this.link})
      .then((res)=>{
        this.getAll();
      })
      }
      ,
      post(){
      axios.post(`http://127.0.0.1/api`, {title:this.title, link:this.link})
      .then((res)=>{
        this.getAll();
      })
      }
  }
}
/* eslint-enable */
</script>

<style>

</style>
