<template>
  <div class="container">
    <!-- 导航栏 -->
    <van-nav-bar class="nav-bar" left-arrow @click-left="$router.back()">
      <template #title>
        <van-field type="text" left-icon="search" placeholder="搜索" />
      </template>
    </van-nav-bar>
    <div class="product-list">
      <div class="left-menu-outsider">
        <van-sidebar
          class="left-menu"
          v-model="selectedCat"
          @change="categoryChange"
        >
          <van-sidebar-item
            v-for="(item, index) in typelist"
            :key="index"
            :title="item"
            ref="sidebarItem"
            @click="slideitem(item)"
          />
        </van-sidebar>
      </div>
      <div class="right-content" ref="rightContent">
        <!--每个分类中的产品分类-->
        <div
          class="product"
          v-for="(item, index) in commoditylist"
          :key="index"
          :ref="item.c_type"
        >
          <van-image
            class="product-img"
            :src="'/static/imgs/commodity/' + item.c_icon"
          ></van-image>
          <div class="product-info">
            <div class="product-info-name">{{ item.c_name }}</div>
            <div class="product-info-price">
              <!-- 商品数量为0时 -->
              <span class="price-sum" v-if="item.c_num == 0"
                >￥{{ (item.c_price / 100).toFixed(2) }}</span
              >
              <!-- 商品数量不为0时 -->
              <span class="price-sum" v-if="item.c_num != 0"
                >￥{{ (item.c_total / 100).toFixed(2) }}</span
              >
              <van-image
                class="plus-img"
                :src="plus"
                @click="numadd(index)"
              ></van-image>
              <span class="num">{{ item.c_num }}</span>
              <van-image
                v-show="item.c_num != 0"
                class="minus-img"
                :src="minus"
                @click="numless(index)"
              ></van-image>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <van-submit-bar
      :disabled="flag()"
      :price="money"
      button-text="提交订单"
      tip="你的商品未达到配送要求"
      tip-icon="info-o"
      @submit="onSubmit"
    /> -->
    <van-action-bar>
      <van-action-bar-icon icon="chat-o" text="客服" @click="onClickIcon" />
      <van-action-bar-icon
        icon="cart-o"
        text="购物车"
        :badge="nums"
        @click="onClickIcon"
      />
      <van-action-bar-button
        :disabled="flag()"
        type="danger"
        text="立即购买"
        @click="onSubmit"
      />
    </van-action-bar>
    <van-popup
      z-index="1"
      class="popup"
      v-model:show="show"
      :style="{ height: '8%', width: '80%' }"
    >
      <!-- 密码输入框 -->
      <van-password-input
        :value="value"
        :focused="showKeyboard"
        @focus="showKeyboard = true"
      />
    </van-popup>

    <!-- 数字键盘 -->
    <div class="keyboard">
      <van-number-keyboard
        z-index="100"
        v-model="value"
        :show="showKeyboard"
        @blur="showKeyboard = false"
      />
    </div>
  </div>
</template>

<script>
import globalConfig from '../../../globalConfig.vue';
import { CellGroup, Dialog, Toast } from "vant";
import { nextTick } from "@vue/runtime-core";
export default {
  data() {
    return {
      nums: 0,
      show: false,
      value: "",
      time: 0,
      showKeyboard: false,
      money: 0,
      typelist: [],
      commoditylist: [],
      cartlist: [],
      img: require("../../../assets/imgs/home/recommend/baijila.png"),
      minus: require("../../../assets/imgs/order/meal/minus.png"),
      plus: require("../../../assets/imgs/order/meal/plus.png"),
    };
  },
  created() {
    this.getGoodsReq();
  },
  watch: {
    value() {
      if (this.value.length == 6) {
        this.$axios({
          methods: "post",
          url: globalConfig.base_url+`/deliveryServer/paymentcode.php?username=${sessionStorage.getItem(
            "username"
          )}&payword=${this.value}`,
        })
          .then((res) => {
            console.log(res);
            this.value = "";
            if (res.message == "密码正确") {
              this.$axios({
                methods: "post",
                url: globalConfig.base_url+`/deliveryServer/updatecart.php?username=${sessionStorage.getItem(
                  "username"
                )}&total=${this.money}&title=${
                  this.$route.query.shopname
                }&state=已完成`,
              }).catch((error) => {
                console.log(error);
              });
              //隐藏弹出层
              this.show = false;
              Dialog.alert({
                title: "提示",
                message: "已支付，订单完成。",
              });
            } else {
              this.$axios({
                methods: "post",
                url: globalConfig.base_url+`/deliveryServer/updatecart.php?username=${sessionStorage.getItem(
                  "username"
                )}&total=${this.money}&title=${
                  this.$route.query.shopname
                }&state=未完成`,
              }).catch((error) => {
                console.log(error);
              });
              this.show = false;
              this.value = "";
              Dialog.alert({
                title: "提示",
                message: "支付密码错误，请与订单界面查看。",
              });
            }
          })
          .catch((error) => {
            console.log(error);
          });
      }
    },
  },
  methods: {
    onClickIcon() {
      this.commoditylist.forEach((item) => {
        if (item.c_num != 0) {
          this.cartlist.push(item);
        }
        console.log(this.cartlist);
      });
      this.$router.push({
        name: "Shopcart",
        query: { carts: JSON.stringify(this.cartlist) ,shopname:this.$route.query.shopname},
      });
    },
    slideitem(p) {
      //点击侧边栏滑动
      this.$nextTick(() => {
        this.$refs[p][0].scrollIntoView(true);
      });
    },
    getGoodsReq() {
      this.$axios({
        methos: "get",
        url: globalConfig.base_url+`/deliveryServer/commodity.php?id=${this.$route.query.id}`,
      })
        .then((res) => {
          this.commoditylist = res.data;
          //将商品中的类提取出来
          //数组去重
          this.typelist = [
            ...new Set(
              res.data.map((item) => {
                return item.c_type;
              })
            ),
          ];
        })
        .catch((error) => {
          console.log(error);
        });
    },
    //商品数量减少事件
    numless(index) {
      if (this.commoditylist[index].c_num == 0) {
        return;
      } else {
        this.nums--;
        this.commoditylist[index].c_num--;
        this.commoditylist[index].c_total -= this.commoditylist[index].c_price;
        this.money = this.total_m();
      }
    },
    //商品数量增加事件
    numadd(index) {
      if (this.commoditylist[index].c_num == 99) {
        return;
      } else {
        this.nums++;
        this.commoditylist[index].c_num++;
        this.commoditylist[index].c_total += this.commoditylist[index].c_price;
        this.money = this.total_m();
      }
    },
    total_m() {
      this.money = 0;
      this.commoditylist.forEach((item) => {
        this.money += item.c_price * item.c_num;
      });
      return this.money;
    },
    flag() {
      if (this.money > 0) {
        return false;
      }
      return true;
    },
    onSubmit() {
      this.showPopup();
    },
    showPopup() {
      this.showKeyboard = true;
      this.show = true;
    },
  },
};
</script>

<style lang="scss" scoped>
//去掉滚动条
::-webkit-scrollbar {
  width: 0 !important;
  height: 0;
}

.container {
  .nav-bar {
    position: fixed;
    top: 0px;
    width: 100%;
  }
  //商品列表区域
  .product-list {
    position: fixed;
    top: 56px;
    bottom: 60px;
    height: 100%;

    overflow: hidden;
    padding-bottom: 56px;
    box-sizing: border-box;
    display: flex;
    justify-content: space-between;
    .left-menu-outsider {
      width: 90px;
      margin-bottom: 50px;
      //左侧菜单
      .left-menu {
        width: 80px;
        overflow: auto;
        padding-bottom: 56px;
      }
    }
    .right-content {
      // position: relative;
      width: 290px;
      overflow: auto;
      // bottom: 90px;
      // margin-bottom: 100px;
      padding-bottom: 100px;
      // border-style:solid;
      .product {
        // border-style:solid;
        height: 100px;
        padding: 5px;
        .product-img {
          float: left;
          width: 100px;
          height: 100px;
        }
        .product-info {
          float: right;
          // border-style:solid;
          height: 100px;
          width: 160px;
          .product-info-name {
            height: 80px;
          }
          .product-info-price {
            .price-sum {
              float: left;
            }
            .plus-img {
              float: right;
            }

            .num {
              width: 30px;
              float: right;
            }
            .minus-img {
              float: right;
            }
          }
        }
      }
    }
  }
  .popup {
    z-index: 10;
  }
  .keyword {
    bottom: 0px;
    // z-index: 100;
  }
}
</style>