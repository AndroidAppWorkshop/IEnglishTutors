# About WebSite Building

Back-End 使用 PHP 搭 CodeIgniter 框架架設在 HostGator 上, Front-To-End 分別使用 KnockoutJs / AngularJs  框架去建構前後台, 套件與打包流程使用 Gulp / Bower 去管理.

# Example

[前台](http://lab.ienglishtutors.com/)

[後台](http://lab.ienglishtutors.com/WebPortal)

# Documents

### 如何控制頁面該載入哪些 JS/CSS ?

在不同網頁會跟著不同的 URL, 尤其各家 MVC 框架特性都會實現簡顯易懂的 Router, 可以依據這些獨特的 Router 去配置相對應載入的文檔.

### 使用套件管理 / 打包省去許多人工打包的流程 ?

使用 Bower 去管理套件搭配 Gulp 去建構打包流程:

![檔案打包](/assets/images/readme/0.png)

並在底層 Layout 去掃 gulp 相關設定檔, 把需要的資料 Caches 起來. 當 Render 畫面的時候依據開發/生產環境去把相對應的未打包或是打包的檔案去串進去 HTML, 當然同理可以使用 Webpack 去做出同樣的效果.

### 若更新 JS/CSS 被瀏覽器 Cache 住的話要怎麼辦 ?

讓瀏覽器認為你發的請求不是重複的即可, 在後台建構一個功能去掃檔案被更新時把時間戳記給更新, 並將時間戳記帶入請求, 瀏覽器就會去把檔案重新下載回來.

![解決瀏覽器 Caches 問題](/assets/images/readme/1.png)

### 語系切換的選擇 ?

語系切換其實 CodeIgniter 也有做一套, 當然 i18N 也是一種選擇, 端看你專案適合什麼樣的需求. 我這邊是用資料庫去關聯出每張 Pages 需要用的 Json, 在把這些 Json 倒入頁面底部. 當使用者去做切換語系的動作把 Session 值改掉去取資料庫拿出相對應的資料.

### 檔案上傳 / 下載 ?

使用別人寫好的 ng-file-upload 的套件去把檔案上傳功能給完成, 下載則是直接使用 CodeIgniter 提供的 Download API.