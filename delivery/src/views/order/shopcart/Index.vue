<template>
  <div class="container">
    <van-nav-bar class="nav-bar" left-arrow @click-left="$router.back()">
    </van-nav-bar>
    <van-swipe-cell v-for="(item, index) in shopcart" :key="index">
      <van-card
        :num="item.c_num"
        :price="(item.c_total / 100).toFixed(2)"
        desc="描述信息"
        :title="item.c_name"
        class="goods - card"
        :thumb="'/static/imgs/commodity/' + item.c_icon"
      >
        <template #footer>
          <van-button
            color="#7232dd"
            size="small"
            :disabled="item.c_num <= 1"
            @click="numless(index)"
            >-</van-button
          >
          <van-button color="#7232dd" size="small" @click="numadd(index)"
            >+</van-button
          >
        </template>
      </van-card>
      <template #right>
        <van-button
          square
          text="删除"
          type="danger"
          class="delete-button"
          @click="deletecart(index)"
        />
      </template>
    </van-swipe-cell>
    <van-submit-bar :price="money" button-text="提交订单" @submit="onSubmit"/>
  </div>
</template>

<script>
import globalConfig from '../../../globalConfig.vue';
import { nextTick } from "@vue/runtime-core";
import { Dialog } from "vant";
export default {
  data() {
    return {
      shopcart: [],
      nums: 0,
      money: 0,
      // checked:[],
      // checkbox:[],
    };
  },
  created() {
    this.shopcart = JSON.parse(this.$route.query.carts);
    this.total_m();
  },
  watch: {},
  methods: {
    onSubmit() {
        window.location.href = globalConfig.base_url+'/deliveryServer/alipay.trade.page.pay-PHP-UTF-8/index.php?money='+(this.money/100).toFixed(2)+'&name='+this.$route.query.shopname
    },
    deletecart(index) {
      Dialog.confirm({
        title: "警告",
        message: `"确认删除${this.shopcart[index].c_name}吗？"`,
      })
        .then(() => {
          this.shopcart.splice(index, 1);
          this.total_m();
        })
        .catch(() => {});
    },
    numless(index) {
      if (this.shopcart[index].c_num <= 1) {
        return;
      } else {
        this.nums--;
        this.shopcart[index].c_num--;
        this.shopcart[index].c_total -= this.shopcart[index].c_price;
        this.money = this.total_m();
      }
    },
    //商品数量增加事件
    numadd(index) {
      if (this.shopcart[index].c_num == 99) {
        return;
      } else {
        this.nums++;
        this.shopcart[index].c_num++;
        this.shopcart[index].c_total += this.shopcart[index].c_price;
        this.money = this.total_m();
      }
    },
    total_m() {
      this.money = 0;
      this.shopcart.forEach((item) => {
        this.money += item.c_price * item.c_num;
      });
      return this.money;
    },
  },
};
</script>

<style lang="scss" scoped>
.goods-card {
  margin: 0;
  background-color: white;
}
.delete-button {
  height: 100%;
}
</style>