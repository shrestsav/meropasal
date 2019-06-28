<template>
  <div class="card">
    <div class="card-header">
      <div class="row align-items-center">
        <div class="col-8">
          <h3 class="mb-0">Add Items</h3>
        </div>
      </div>
    </div>
    <div class="card-body">
      <form v-for="(section,sec_name,index) in fields">
        <h6 class="heading-small text-muted mb-4">{{sec_name}}</h6>
        <div class="pl-lg-4">
          <div class="row">
            <div :class="'col-lg-'+item['col']" v-for="item,key in section">
              <div class="form-group">
                <label class="form-control-label" :for="'input-'+key">{{item['display_name']}}</label>
                <input 
                  v-if="item['type']==='text' || item['type']==='number'" 
                  :class="{'not-validated':errors[key]}" 
                  :type="item['type']" 
                  :id="'input-'+key" 
                  :placeholder="item['display_name']" 
                  v-model="form[key]"
                  class="form-control" 
                >
                <date-picker 
                  v-if="item['type']==='datetime'"  
                  v-model="form[key]"
                  lang='en'
                  :type="item['type']" 
                  input-class="form-control"
                  valueType="format" 
                  format="YYYY-MM-DD HH:mm"
                  :class="{'not-validated':errors[key]}" 
                ></date-picker>
                <textarea 
                  v-if="item['type']==='textarea'" 
                  rows="4" 
                  :class="{'not-validated':errors[key]}" 
                  class="form-control" 
                  placeholder="" 
                  v-model="form[key]"
                ></textarea>
                <div class="invalid-feedback" style="display: block;" v-if="errors[key]">
                  {{errors[key][0]}}
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr class="my-4"/>
      </form>
    </div>
    <div class="card-footer text-center">
      <button class="btn btn-outline-primary" @click="initializeForm">Reset</button>
      <button class="btn btn-outline-primary" @click="save">Save Item</button>
    </div>
  </div>
</template>

<script>

  import DatePicker from 'vue2-datepicker'
  export default{
    components: {
      DatePicker
    },
    data(){
      return{
        form: {},
        errors:{},
        fields:{},
      }
    },
    mounted(){
      this.defSettings();
    },
    methods:{
      defSettings(){
        this.$Progress.start();
        axios.get('addItemFields').then(response => this.fields = response.data);
        this.$Progress.finish();
      },
      save(){
        this.$Progress.start();
        axios.post('/items',this.$data.form)
        .then((response) => {
          showNotify('primary','Item has been Added');
          this.$router.push({ name: 'editItems', params: { item_id:response.data } });
          this.$Progress.finish();
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
          for (var prop in this.errors) {
            showNotify('danger',this.errors[prop])
          }       
        })
      },
      initializeForm(){
        this.$data.form = {}  
      },
    },
  }

</script>
<style>
  .mx-datepicker{
    width: unset;
    display: unset;
  }
  .mx-datepicker-popup{
    top: 0 !important;
  }
  .not-validated{
    border-color: #fb6340;
  }
  .form-control .vs__dropdown-toggle {
    border: 0px !important;
  }
</style>