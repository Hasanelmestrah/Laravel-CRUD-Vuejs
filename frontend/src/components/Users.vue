<template>
    <div class ="container" >
      <h2>Users Registation</h2>
                    <form @submit.prevent="save">
                    
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" v-model="users.name" class="form-control"  placeholder="Username">
                    
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" v-model="users.email" class="form-control"  placeholder="email">
                    
                    </div>
                    
                    <div class="form-group">
                        <label>Sex</label>
                        <input type="text" v-model="users.sex" class="form-control"  placeholder="sex">
                    
                    </div>
                     <div class="form-group">
                        <label>Blood Type</label>
                        <input type="text" v-model="users.blood_type" class="form-control"  placeholder="blood type">
                    
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Save</button>
                    </form>
 
 




<h2>Admin Dashboard</h2>
      <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Sex</th>
      <th scope="col">Blood type</th>
      <th scope="col">Edite</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="users in result" v-bind:key="users.id">
          
          <td>{{ users.id }}</td>
          <td>{{ users.name }}</td>
          <td>{{ users.email }}</td>
          <td>{{ users.sex }}</td>
          <td>{{ users.blood_type }}</td>
          <td>
            <button type="button" class="btn btn-warning" @click="edit(users)">Edit</button>
            <button type="button" class="btn btn-danger"  @click="remove(users)">Delete</button>
          </td>
        </tr>
    
  </tbody>
  
</table>
     
    </div>
  </template>
  <script>
    
   import axios from 'redaxios';
 
  export default {
    name: 'users',
    data () {
      return {
        result: {},
        users:{
                   id: '',
                   name: '',
                   email: '',
                   sex: '',
                   blood_type: ''
 
 
        }
      }
    },
    created() { 
        this.UsersLoad();
        console.log("Data loaded:", this.result);
    },
    mounted() {
          console.log("mounted() called.......");
          
         
      },
 
    methods: {
           UsersLoad()
           {
                 var page = "http://127.0.0.1:8000/api/users";
                 axios.get(page)
                  .then(
                      ({data})=>{
                        console.log(data);
                        this.result = data;
                      }
                  );
           },
           
          
           save()
           {
            if(this.users.id == '')
              {
                this.saveData();
              }
              else
              {
                this.updateData();
              }       
 
           },
           saveData()
           {
            axios.post("http://127.0.0.1:8000/api/users", this.users)
            .then(
              ({data})=>{
                alert("saveddddd");
                  this.UsersLoad();
                  this.users.id = '';
                  this.users.name = '';
                  this.users.email = '';
                  this.users.sex = '';
                  this.users.blood_type = '';
                  
              }
            )
 
           },
           edit(users)
           {
            this.users = users;
           
           },
           updateData()
           {
              var editrecords = 'http://127.0.0.1:8000/api/users/'+ this.users.id;
              axios.put(editrecords, this.users)
              .then(
                ({data})=>{
                  this.users.id = ''; 
                  this.users.name = '';
                  this.users.email = '';
                  this.users.sex = '';
                  this.users.blood_type = '';
                  alert("Updated!!!");
                  this.UsersLoad();
                }
              );
 
           },
 
           remove(users){
 
             var url = `http://127.0.0.1:8000/api/users/${users.id}`;
 
 
 
             // var url = 'http://127.0.0.1:8000/api/users/'+ users.id;
              axios.delete(url);
              alert("Deleteddd");
              this.UsersLoad();
            }
      }
  }
  </script>