# IPTV
**肥羊的IPTV直播源搜集仓库**  
**肥羊影音数码综合Telegram交流群：[点击加入](https://t.me/feiyangdigital)**  
**肥羊影音数码综合Telegram频道：[点击加入](https://t.me/feiyangofficalchannel)**  
## 抖音世界杯直播源PHP代理
- **使用Docker一键部署**
    amd64架构∶
    ```shell
    docker run -d --restart unless-stopped --privileged=true -p 9527:80 --name douyin-php youshandefeiyang/douyin-php:amd64
    ```
    arm64架构
    ```shell
    docker run -d --restart unless-stopped --privileged=true -p 9527:80 --name douyin-php youshandefeiyang/douyin-php:arm64
    ```
- **访问地址:**
    ```shell
    http://你的IP:9527/zb.php?id=douyin 
    ```
