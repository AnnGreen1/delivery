<template>
  <div class="container">
    <div class="header">
      <div class="header-address">
        <van-icon class="location-o" name="location-o" />
        <span v-if="localization">{{ localization }}</span>
        <span v-else>湾沚镇</span>
        <van-icon class="arrow" name="arrow" />
      </div>
      <div class="header-search">
        <van-search
          v-model="value"
          right-icon="search"
          placeholder="请输入搜索关键词"
        />
      </div>
    </div>

    <div class="product">
      <section class="layout">
        <div
          class=""
          v-for="(item, index) in products"
          :key="index"
          @click="$router.push({ name: 'order', query: { name: item.name } })"
        >
          <img :src="item.src" alt="" srcset="" />
          <div>{{ item.name }}</div>
        </div>
      </section>
    </div>
    <div class="recommend">
      <div class="recommend-title">
        <span>附近商家</span>
      </div>
      <div class="recommend-content">
        <div v-for="(item, index) in merchant" @click="order(item)" :key="index">
          <van-card
            desc="信息"
            :title="item.s_name"
            :thumb="'/static/imgs/shop/' + item.s_icon"
          >
            <template #tags>
              <van-tag plain type="danger">标签</van-tag>
              <van-tag plain type="danger">标签</van-tag>
            </template>
          </van-card>
        </div>
      </div>
    </div>
  </div>
  <tab-bar></tab-bar>
</template>

<script>
import globalConfig from '../../globalConfig.vue';
import TabBar from "../../components/TabBar.vue";
// import AMap from "AMap";
export default {
  data() {
    return {
      latitude:0,
      longitude:0,
      localization:'',
      value: "",
      merchant: [],
      products: [
        {
          src: require("@/assets/imgs/home/product/meishi.png"),
          name: "美食",
        },
        {
          src: require("@/assets/imgs/home/product/chaoshi.png"),
          name: "超市",
        },
        {
          src: require("@/assets/imgs/home/product/shengxianguoshu.png"),
          name: "生鲜果蔬",
        },
        {
          src: require("@/assets/imgs/home/product/zhuansong.png"),
          name: "专送",
        },
        {
          src: require("@/assets/imgs/home/product/kuaishijiancan.png"),
          name: "快餐简餐",
        },
        {
          src: require("@/assets/imgs/home/product/wancanyouxuan.png"),
          name: "晚餐优选",
        },
        {
          src: require("@/assets/imgs/home/product/tiandianyinpin.png"),
          name: "甜点饮品",
        },
        {
          src: require("@/assets/imgs/home/product/jiachangcai.png"),
          name: "家常菜",
        },
        {
          src: require("@/assets/imgs/home/product/xiaochiguan.png"),
          name: "小吃馆",
        },
        {
          src: require("@/assets/imgs/home/product/xianhuadangao.png"),
          name: "鲜花蛋糕",
        },
      ],
    };
  },
  components: {
    "tab-bar": TabBar,
  },
  methods: {
    order(item) {
      console.log("------------------");
      this.$router.push({ name: 'Meal', query: { id: item.s_id ,shopname:item.s_name} })
    },
//     getLocation() {
//       const self = this;
//       var geolocation = new AMap.Geolocation({
//         // 是否使用高精度定位，默认：true
//         enableHighAccuracy: true,
//         // 设置定位超时时间，默认：无穷大
//         timeout: 10000,
//       });
//       geolocation.getCurrentPosition(function (status, data) {
//         if (status == "complete") {
//           // data是具体的定位信息
//           console.log(data);
//           // 打印位置信息
//           // console.log(data.position);
//           // 打印经纬度
//           console.log(data.position.lng, data.position.lat);

// /**
//  * 
//  * 
//  */
//         //   this.longitude = data.position.lng;
//         //   this.latitude = data.position.lat;

// /**
//  * 
//  * 
//  */

//           // 接着进行逆向地理编码，坐标 -> 地址
//           var geocoder = new AMap.Geocoder({
//             // city 指定进行编码查询的城市，支持传入城市名、adcode 和 citycode
//             city: "全国",
//           });
//           var lnglat = [data.position.lng, data.position.lat];
//           geocoder.getAddress(lnglat, function (status, result) {
//             if (status === "complete" && result.regeocode) {
//               console.log(result.regeocode);
              
//               // 将地址信息对象赋值，将定位到的地址展示在表单中
//               self.AddressInfo = {
//                 province: result.regeocode.addressComponent.province,
//                 city: result.regeocode.addressComponent.city,
//                 county: result.regeocode.addressComponent.district,
//                 addressDetail: result.regeocode.formattedAddress,
//                 areaCode: result.regeocode.addressComponent.adcode, // 必须要加上，否则不显示地区
//               };
//             } else {
//               console.log(result);
//             }
//           });
//         } else {
//           // onError(result)
//           // 定位出错
//           console.log("定位失败错误：", data.message);
//           // 调用IP定位
//         self.getLngLatLocation();
//         }
//       });
//     },
//     // 通过IP获取当前位置
//     getLngLatLocation() {

//       const self = this;
//       var citySearch = new AMap.CitySearch();
//       citySearch.getLocalCity(function (status, result) {
//         if (status === "complete" && result.info === "OK") {
//           // 查询成功，result即为当前所在城市信息
//           console.log("通过ip获取当前城市：", result);

// /**
//  * 
//  * 
//  */

//         console.log(result.bounds.northEast.lng);
//         console.log(result.bounds.northEast.lat);

//         self.longitude = result.bounds.northEast.lng;
//         self.latitude = result.bounds.northEast.lat;

// /**
//  * 
//  * 
//  */
//           // 逆向地理编码
//           var geocoder = new AMap.Geocoder({
//             // city 指定进行编码查询的城市，支持传入城市名、adcode 和 citycode
//             city: result.adcode,
//           });
//           var lnglat = result.rectangle.split(";")[0].split(",");
//           geocoder.getAddress(lnglat, function (status, data) {
//             if (status === "complete" && data.info === "OK") {
//               // result为对应的地理位置详细信息

// /**
//  * 
//  * 
//  */
//               console.log("data.regeocode")
//               console.log(data.regeocode);
//               console.log(data.regeocode.formattedAddress);
//               self.localization = data.regeocode.formattedAddress;
              
             
// /**
//  * 
//  * 
//  */
//                 // 将地址信息对象赋值，将定位到的地址展示在表单中
//               self.AddressInfo = {
//                 province: data.regeocode.addressComponent.province,
//                 city: data.regeocode.addressComponent.city,
//                 county: data.regeocode.addressComponent.district,
//                 addressDetail: data.regeocode.formattedAddress,
//                 areaCode: data.regeocode.addressComponent.adcode, // 必须要加上，否则不显示地区
//               };
//             } else {
//               console.log(data);
//             }
//           });
//         }
//       });


    
//     },
  },
   created() {
    //this.getLocation();
    console.log("latitude:"+this.latitude+" longitude:"+this.longitude+" localization:"+this.localization);
    this.$axios({
      methods: "get",
      url: globalConfig.base_url+`/deliveryServer/home.php?`,
    })
      .then((res) => {
        this.merchant = res.data;
      })
      .catch((error) => {
        console.log(error);
      });
  },
  // beforecreated(){
  //   this.getLocation();
  // }
};
</script>

<style lang="scss" scoped>
// img {
//   width: 100%;
//   background-repeat: no-repeat;
// }

.container {
  .header {
    z-index: 100;
    position: fixed;
    top: 0px;
    width: 100%;
    height: 85px;
    background-color: rgb(255, 204, 51);

    .header-address {
      // border-style: solid;
      width: 100%;
      height: 25px;
      // margin-top:5px;

      .location-o {
        margin: 5px;
        font-size: 22px;
        line-height: 22px;
        float: left;
      }
      span {
        margin-top: 5px;
        float: left;
      }
      .arrow {
        font-size: 18px;
        line-height: 18px;
        margin-top: 7px;
        float: left;
      }
    }
    .header-search {
      border-style: solid;
      color: rgb(255, 204, 51);
      margin-top: 5px;
      width: 100%;
      height: 40px;
      :deep .van-search {
        background-color: rgb(255, 204, 51);
        color: rgb(255, 204, 51);
        :deep .van-search__content--square {
          border-radius: 10px;
        }
      }
    }
  }
  .product {
    margin-top: 100px;
    //margin-top: 10px;
    .layout {
      width: 400px;
      height: 180px;
      display: grid;
      grid-template-rows: repeat(2, 1fr);
      grid-template-columns: repeat(5, 1fr);
      gap: 8px;
      div {
        img {
          width: 44px;
          height: 44px;
        }
        div {
          font-size: 5px;
        }
      }
    }
  }
  .recommend {
    .recommend-title {
      width: 100%;
      height: 20px;
      margin-left: 10px;
      margin-bottom: 10px;
      span {
        float: left;
        font-size: 20px;
      }
    }
    .recommend-content {
      z-index: 1;
      position: relative;
      padding: 10px;
      width: 100%;
      height: auto;
      margin-bottom: 40px;
      // .recommend-content-img {
      //   margin: 10px;
      //   float: left;
      // }
      // .recommend-content-info {
      //   margin: 10px;
      //   float: right;
      // }
      .van-card {
        z-index: -1;
      }
      // template{
      //   z-index:-1;
      //   van-tag{
      //     z-index:-1;
      //   }
      // }
    }
  }
}
</style>