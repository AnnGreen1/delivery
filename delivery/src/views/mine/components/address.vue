<template>
  <van-nav-bar
    class="nav-bar"
    :title="title"
    left-arrow
    @click-left="$router.push('/mine')"
  ></van-nav-bar>
  <div>
    <div class="address">
      <van-address-list
        v-model="chosenAddressId"
        :list="list"
        :disabled-list="disabledList"
        default-tag-text="默认"
        @click="$router.push({path:'/mine/newaddress'})"
        @edit="onEdit"
      />
    </div>
  </div>
</template>

<script>
import globalConfig from '../../../globalConfig.vue';
import { AddressList } from 'vant';
import { ref } from 'vue';
export default {
  data() {
    const chosenAddressId = ref('1');
    return {
      title: '',
      type: -1,
      list:[
      // {
      //   id: '1',
      //   name: '张三',
      //   tel: '13000000000',
      //   address: '浙江省杭州市西湖区文三路 138 号东方通信大厦 7 楼 501 室',
      //   isDefault: true,
      // },
      // {
      //   id: '2',
      //   name: '李四',
      //   tel: '1310000000',
      //   address: '浙江省杭州市拱墅区莫干山路 50 号',
      //   isDefault: false,
      // },
    ],
      chosenAddressId,
    }
  },
  created(){
    console.log(sessionStorage.getItem('username'));
    this.$axios({
        methods:'post',
        url:globalConfig.base_url+`/deliveryServer/getaddresslist.php?email=${sessionStorage.getItem('username')}`,
    })
    .then((res) => {
      console.log(res);
      console.log(res.data);
      console.log(res.data[0]);
      for(let times=0;times<res.data.length;times++)
      {
        console.log(res.data[times]);
        
      if(res.data[times].a_default == 0)
      {
        this.list.push({
          id:times,
          name:sessionStorage.getItem('nickname'),
          tel:res.data[times].a_tel,
          address:res.data[times].a_localization,
          isDefault:false,
        })
      }else{
        this.list.push({
          id:times,
          name:sessionStorage.getItem('nickname'),
          tel:res.data[times].a_tel,
          address:res.data[times].a_localization,
          isDefault:true,
        })
      }
      }
    })
    .catch((error) => {
      console.log(error);
    })
  }
}
</script>

<style lang="sass" scoped>
</style>