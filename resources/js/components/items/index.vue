<template>
  <div class="card">
    <div class="card-header border-0">
      <div class="row">
        <div class="col-6">
          <h3 class="mb-0">Items</h3>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th>S.No</th>
            <th>Item</th>
            <th>Quantity</th>
            <th>M.R.P</th>
            <th>Discount</th>
            <th>Selling Price</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item,key in items.data">
            <td>{{++key}}</td>
            <td>{{item.name}}</td>
            <td>{{item.quantity}}</td>
            <td>{{item.market_price}}</td>
            <td>{{item.discount}}</td>
            <td>{{item.sell_price}}</td>
            
            <td>
              <a href="#" class="table-action" @click="showDetails(key-1)" data-toggle="modal" data-target="#showJobDetails">
                <i class="fas fa-eye"></i>
              </a>
              <a href="#" class="table-action" @click="editItem(item.id)">
                <i class="fas fa-edit"></i>
              </a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="card-footer py-4">
      <pagination :data="items" @pagination-change-page="getResults"></pagination>
    </div>
    <show></show>
  </div>
</template>

<script>
  import show from './show.vue'

  export default{
    components: {
      show
    },
    data(){
      return{
        errors:{},
        items:{},
      }
    },
    mounted(){
      this.getResults();
    },
    methods:{
      getResults(page = 1) {
        this.$Progress.start();
        axios.get('items?page=' + page)
          .then(response => {
            this.$Progress.finish();
            this.items = response.data;
          });
      },
      showDetails(key){
        this.$children[1].details = this.items.data[key]
      },
      editItem(id){
        this.$router.push({ name: 'editItem', params:{ item_id:id } });
      }
    }

  }

</script>