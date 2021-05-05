<?php
require 'session.php';

$sql= "SELECT * from student_login WHERE Admission_NO != ".$student_login['Admission_NO']."";
$listuser = mysqli_query($con,$sql);

$sql= "SELECT * from faculty_login where branch_id = ".$student_login['BRANCH']."";
$listfaculty = mysqli_query($con,$sql);



?>
<style>
   @charset "UTF-8";
   @import url("https://fonts.googleapis.com/css?family=Manrope:300,400,500,600,700&display=swap&subset=latin-ext");
  *{
   margin: 0;
   padding: 0;
   box-sizing: border-box;
  }
   /* custom scrollbar */
   ::-webkit-scrollbar {
   width: 20px;
   }
   ::-webkit-scrollbar-track {
   background-color: inherit;
   }
   ::-webkit-scrollbar-thumb {
   background-color: #d6dee1;
   border-radius: 20px;
   border: 6px solid transparent;
   background-clip: content-box;
   }
   ::-webkit-scrollbar-thumb:hover {
   background-color: #a8bbbf;
   }
   :root {
   --body-bg-color: #e5ecef;
   --theme-bg-color: #fff;
   --settings-icon-hover: #9fa7ac;
   --developer-color: #f9fafb;
   --input-bg: #f8f8fa;
   --input-chat-color: #a2a2a2;
   --border-color: #eef2f4;
   --body-font: "Manrope", sans-serif;
   --body-color: #273346;
   --settings-icon-color: #c1c7cd;
   --msg-message: #969eaa;
   --chat-text-bg: #f1f2f6;
   --theme-color: #0086ff;
   --msg-date: #c0c7d2;
   --button-bg-color: #f0f7ff;
   --button-color: var(--theme-color);
   --detail-font-color: #919ca2;
   --msg-hover-bg: rgba(238, 242, 244, 0.4);
   --active-conversation-bg: linear-gradient(
   to right,
   rgba(238, 242, 244, 0.4) 0%,
   rgba(238, 242, 244, 0) 100%
   );
   --overlay-bg: linear-gradient(
   to bottom,
   rgba(255, 255, 255, 0) 0%,
   rgba(255, 255, 255, 1) 65%,
   rgba(255, 255, 255, 1) 100%
   );
   --chat-header-bg: linear-gradient(
   to bottom,
   rgba(255, 255, 255, 1) 0%,
   rgba(255, 255, 255, 1) 78%,
   rgba(255, 255, 255, 0) 100%
   );
   }
   [data-theme=purple] {
   --theme-color: #9f7aea;
   --button-color: #9f7aea;
   --button-bg-color: rgba(159, 122, 234, 0.12);
   }
   [data-theme=green] {
   --theme-color: #38b2ac;
   --button-color: #38b2ac;
   --button-bg-color: rgba(56, 178, 171, 0.15);
   }
   [data-theme=orange] {
   --theme-color: #ed8936;
   --button-color: #ed8936;
   --button-bg-color: rgba(237, 137, 54, 0.12);
   }
   .dark-mode {
   --body-bg-color: #1d1d1d;
   --theme-bg-color: #27292d;
   --border-color: #323336;
   --body-color: #d1d1d2;
   --active-conversation-bg: linear-gradient(
   to right,
   rgba(47, 50, 56, 0.54),
   rgba(238, 242, 244, 0) 100%
   );
   --msg-hover-bg: rgba(47, 50, 56, 0.54);
   --chat-text-bg: #383b40;
   --chat-text-color: #b5b7ba;
   --msg-date: #626466;
   --msg-message: var(--msg-date);
   --overlay-bg: linear-gradient(
   to bottom,
   rgba(0, 0, 0, 0) 0%,
   #27292d 65%,
   #27292d 100%
   );
   --input-bg: #2f3236;
   --chat-header-bg: linear-gradient(
   to bottom,
   #27292d 0%,
   #27292d 78%,
   rgba(255, 255, 255, 0) 100%
   );
   --settings-icon-color: #7c7e80;
   --developer-color: var(--border-color);
   --button-bg-color: #393b40;
   --button-color: var(--body-color);
   --input-chat-color: #6f7073;
   --detail-font-color: var(--input-chat-color);
   }
   .blue {
   background-color: #0086ff;
   }
   .purple {
   background-color: #9f7aea;
   }
   .green {
   background-color: #38b2ac;
   }
   .orange {
   background-color: #ed8936;
   }
   * {
   outline: none;
   box-sizing: border-box;
   }
   img {
   max-width: 100%;
   }
   body {
   background-color: var(--body-bg-color);
   font-family: var(--body-font);
   color: var(--body-color);
   }
   html {
   box-sizing: border-box;
   -webkit-font-smoothing: antialiased;
   }
   .app {
   display: flex;
   flex-direction: column;
   background-color: var(--theme-bg-color);
   max-width: 1600px;
   height: 100vh;
   margin: 0 auto;
   overflow: hidden;
   }
   .header {
   height: 80px;
   width: 100%;
   border-bottom: 1px solid var(--border-color);
   display: flex;
   align-items: center;
   padding: 0 20px;
   }
   .wrapper {
   width: 100%;
   display: flex;
   flex-grow: 1;
   overflow: hidden;
   }
   .conversation-area,
   .detail-area {
   width: 340px;
   flex-shrink: 0;
   }
   .detail-area {
   border-left: 1px solid var(--border-color);
   margin-left: auto;
   padding: 30px 30px 0 30px;
   display: flex;
   flex-direction: column;
   overflow: auto;
   }
   .chat-area {
   flex-grow: 1;
   }
   .search-bar {
   height: 80px;
   z-index: 3;
   position: relative;
   margin-left: 280px;
   }
   .search-bar input {
   height: 100%;
   width: 100%;
   display: block;
   background-color: transparent;
   border: none;
   color: var(--body-color);
   padding: 0 54px;
   background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 56.966 56.966' fill='%23c1c7cd'%3e%3cpath d='M55.146 51.887L41.588 37.786A22.926 22.926 0 0046.984 23c0-12.682-10.318-23-23-23s-23 10.318-23 23 10.318 23 23 23c4.761 0 9.298-1.436 13.177-4.162l13.661 14.208c.571.593 1.339.92 2.162.92.779 0 1.518-.297 2.079-.837a3.004 3.004 0 00.083-4.242zM23.984 6c9.374 0 17 7.626 17 17s-7.626 17-17 17-17-7.626-17-17 7.626-17 17-17z'/%3e%3c/svg%3e");
   background-repeat: no-repeat;
   background-size: 16px;
   background-position: 25px 48%;
   font-family: var(--body-font);
   font-weight: 600;
   font-size: 15px;
   }
   .search-bar input::placeholder {
   color: var(--input-chat-color);
   }
   .logo {
   color: var(--theme-color);
   width: 38px;
   flex-shrink: 0;
   }
   .logo svg {
   width: 100%;
   }
   .user-settings {
   display: flex;
   align-items: center;
   cursor: pointer;
   margin-left: auto;
   flex-shrink: 0;
   }
   .user-settings > * + * {
   margin-left: 14px;
   }
   .dark-light {
   width: 22px;
   height: 22px;
   color: var(--settings-icon-color);
   flex-shrink: 0;
   }
   .dark-light svg {
   width: 100%;
   fill: transparent;
   transition: 0.5s;
   }
   .user-profile {
   width: 40px;
   height: 40px;
   border-radius: 50%;
   }
   .settings {
   color: var(--settings-icon-color);
   width: 22px;
   height: 22px;
   flex-shrink: 0;
   }
   .conversation-area {
   border-right: 1px solid var(--border-color);
   overflow-y: auto;
   overflow-x: hidden;
   display: flex;
   flex-direction: column;
   position: relative;
   }
   .msg-profile {
   width: 44px;
   height: 44px;
   border-radius: 50%;
   object-fit: contain;
   margin-right: 15px;
   }
   .msg-profile.group {
   display: flex;
   justify-content: center;
   align-items: center;
   background-color: var(--border-color);
   }
   .msg-profile.group svg {
   width: 60%;
   }
   .msg {
   display: flex;
   align-items: center;
   padding: 20px;
   cursor: pointer;
   transition: 0.2s;
   position: relative;
   }
   .msg:hover {
   background-color: var(--msg-hover-bg);
   }
   .msg.active {
   background: var(--active-conversation-bg);
   border-left: 4px solid var(--theme-color);
   }
   .msg.online:before {
   content: "";
   position: absolute;
   background-color: #23be7e;
   width: 9px;
   height: 9px;
   border-radius: 50%;
   border: 2px solid var(--theme-bg-color);
   left: 50px;
   bottom: 19px;
   }
   .msg-username {
   margin-bottom: 4px;
   font-weight: 600;
   font-size: 15px;
   }
   .msg-detail {
   overflow: hidden;
   }
   .msg-content {
   font-weight: 500;
   font-size: 13px;
   display: flex;
   }
   .msg-message {
   white-space: nowrap;
   overflow: hidden;
   text-overflow: ellipsis;
   color: var(--msg-message);
   }
   .msg-date {
   font-size: 14px;
   color: var(--msg-date);
   margin-left: 3px;
   }
   .msg-date:before {
   content: "•";
   margin-right: 2px;
   }
   .add {
   position: sticky;
   bottom: 25px;
   background-color: var(--theme-color);
   width: 60px;
   height: 60px;
   border: 0;
   border-radius: 50%;
   background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='none' stroke='white' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-plus'%3e%3cpath d='M12 5v14M5 12h14'/%3e%3c/svg%3e");
   background-repeat: no-repeat;
   background-position: 50%;
   background-size: 28px;
   box-shadow: 0 0 16px var(--theme-color);
   margin: auto auto -55px;
   flex-shrink: 0;
   z-index: 1;
   cursor: pointer;
   }
   .overlay {
   position: sticky;
   bottom: 0;
   left: 0;
   width: 340px;
   flex-shrink: 0;
   background: var(--overlay-bg);
   height: 80px;
   }
   .chat-area {
   display: flex;
   flex-direction: column;
   position: relative;
   overflow: auto;
   }
   .chat-area-header {
   display: flex;
   position: sticky;
   top: 0;
   left: 0;
   z-index: 2;
   width: 100%;
   align-items: center;
   justify-content: space-between;
   padding: 20px;
   background: var(--chat-header-bg);
   }
   .chat-area-profile {
   width: 32px;
   border-radius: 50%;
   object-fit: cover;
   }
   .chat-area-title {
   font-size: 18px;
   font-weight: 600;
   }
   .chat-area-main {
   flex-grow: 1;
   overflow: scroll;
   margin-bottom: 21px;
   }
   .chat-msg-img {
   height: 40px;
   width: 40px;
   border-radius: 50%;
   object-fit: cover;
   }
   .chat-msg-profile {
   flex-shrink: 0;
   margin-top: auto;
   margin-bottom: -20px;
   position: relative;
   }
   .chat-msg-date {
   position: absolute;
   left: calc(100% + 12px);
   bottom: 0;
   font-size: 12px;
   font-weight: 600;
   color: var(--msg-date);
   white-space: nowrap;
   }
   .chat-msg {
   display: flex;
   padding: 0 20px 45px;
   }
   .chat-msg-content {
   margin-left: 12px;
   max-width: 70%;
   display: flex;
   flex-direction: column;
   align-items: flex-start;
   }
   .chat-msg-text {
   background-color: var(--chat-text-bg);
   padding: 15px;
   border-radius: 20px 20px 20px 0;
   line-height: 1.5;
   font-size: 14px;
   font-weight: 500;
   }
   .chat-msg-text + .chat-msg-text {
   margin-top: 10px;
   }
   .chat-msg-text {
   color: var(--chat-text-color);
   }
   .owner {
   flex-direction: row-reverse;
   }
   .owner .chat-msg-content {
   margin-left: 0;
   margin-right: 12px;
   align-items: flex-end;
   }
   .owner .chat-msg-text {
   background-color: var(--theme-color);
   color: #fff;
   border-radius: 20px 20px 0 20px;
   }
   .owner .chat-msg-date {
   left: auto;
   right: calc(100% + 12px);
   }
   .chat-msg-text img {
   max-width: 300px;
   width: 100%;
   }
   .chat-area-footer {
   border-top: 1px solid var(--border-color);
   width: 100%;
   padding: 10px 20px;
   align-items: center;
   background-color: var(--theme-bg-color);
   position: absolute;
   bottom: 0;
   left: 0;
   overflow: hidden;
   }
   .chat-area-footer svg {
   color: var(--settings-icon-color);
   width: 20px;
   flex-shrink: 0;
   cursor: pointer;
   }
   .chat-area-footer svg:hover {
   color: var(--settings-icon-hover);
   }
   .chat-area-footer svg + svg {
   margin-left: 12px;
   }
   .chat-area-footer input {
   border: none;
   color: var(--body-color);
   background-color: var(--input-bg);
   padding: 12px;
   border-radius: 6px;
   font-size: 15px;
   margin: 0 12px;
   width: 100%;
   }
   .chat-area-footer input::placeholder {
   color: var(--input-chat-color);
   }
   .detail-area-header {
   display: flex;
   flex-direction: column;
   align-items: center;
   }
   .detail-area-header .msg-profile {
   margin-right: 0;
   width: 60px;
   height: 60px;
   margin-bottom: 15px;
   }
   .detail-title {
   font-size: 18px;
   font-weight: 600;
   margin-bottom: 10px;
   }
   .detail-subtitle {
   font-size: 12px;
   font-weight: 600;
   color: var(--msg-date);
   }
   .detail-button {
   border: 0;
   background-color: var(--button-bg-color);
   padding: 10px 14px;
   border-radius: 5px;
   color: var(--button-color);
   display: flex;
   align-items: center;
   justify-content: center;
   font-size: 14px;
   flex-grow: 1;
   font-weight: 500;
   }
   .detail-button svg {
   width: 18px;
   margin-right: 10px;
   }
   .detail-button:last-child {
   margin-left: 8px;
   }
   .detail-buttons {
   margin-top: 20px;
   display: flex;
   width: 100%;
   }
   .detail-area input {
   background-color: transparent;
   border: none;
   width: 100%;
   color: var(--body-color);
   background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 56.966 56.966' fill='%23c1c7cd'%3e%3cpath d='M55.146 51.887L41.588 37.786A22.926 22.926 0 0046.984 23c0-12.682-10.318-23-23-23s-23 10.318-23 23 10.318 23 23 23c4.761 0 9.298-1.436 13.177-4.162l13.661 14.208c.571.593 1.339.92 2.162.92.779 0 1.518-.297 2.079-.837a3.004 3.004 0 00.083-4.242zM23.984 6c9.374 0 17 7.626 17 17s-7.626 17-17 17-17-7.626-17-17 7.626-17 17-17z'/%3e%3c/svg%3e");
   background-repeat: no-repeat;
   background-size: 16px;
   background-position: 100%;
   font-family: var(--body-font);
   font-weight: 600;
   font-size: 14px;
   border-bottom: 1px solid var(--border-color);
   padding: 14px 0;
   }
   .detail-area input::placeholder {
   color: var(--detail-font-color);
   }
   .detail-changes {
   margin-top: 40px;
   }
   .detail-change {
   color: var(--detail-font-color);
   font-family: var(--body-font);
   font-weight: 600;
   font-size: 14px;
   border-bottom: 1px solid var(--border-color);
   padding: 14px 0;
   display: flex;
   }
   .detail-change svg {
   width: 16px;
   margin-left: auto;
   }
   .colors {
   display: flex;
   margin-left: auto;
   }
   .color {
   width: 16px;
   height: 16px;
   border-radius: 50%;
   cursor: pointer;
   }
   .color.selected {
   background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' stroke='%23fff' stroke-width='3' fill='none' stroke-linecap='round' stroke-linejoin='round' class='css-i6dzq1' viewBox='0 0 24 24'%3E%3Cpath d='M20 6L9 17l-5-5'/%3E%3C/svg%3E");
   background-size: 10px;
   background-position: center;
   background-repeat: no-repeat;
   }
   .color:not(:last-child) {
   margin-right: 4px;
   }
   .detail-photo-title {
   display: flex;
   align-items: center;
   }
   .detail-photo-title svg {
   width: 16px;
   }
   .detail-photos {
   margin-top: 30px;
   text-align: center;
   }
   .detail-photo-title {
   color: var(--detail-font-color);
   font-weight: 600;
   font-size: 14px;
   margin-bottom: 20px;
   }
   .detail-photo-title svg {
   margin-right: 8px;
   }
   .detail-photo-grid {
   display: grid;
   grid-template-columns: repeat(4, 1fr);
   grid-column-gap: 6px;
   grid-row-gap: 6px;
   grid-template-rows: repeat(3, 60px);
   }
   .detail-photo-grid img {
   height: 100%;
   width: 100%;
   object-fit: cover;
   border-radius: 8px;
   object-position: center;
   }
   .view-more {
   color: var(--theme-color);
   font-weight: 600;
   font-size: 15px;
   margin: 25px 0;
   }
   .follow-me {
   text-decoration: none;
   font-size: 14px;
   width: calc(100% + 60px);
   margin-left: -30px;
   display: flex;
   align-items: center;
   margin-top: auto;
   overflow: hidden;
   color: #9c9cab;
   padding: 0 20px;
   height: 52px;
   flex-shrink: 0;
   position: relative;
   justify-content: center;
   }
   .follow-me svg {
   width: 16px;
   height: 16px;
   margin-right: 8px;
   }
   .follow-text {
   display: flex;
   align-items: center;
   transition: 0.3s;
   }
   .follow-me:hover .follow-text {
   transform: translateY(100%);
   }
   .follow-me:hover .developer {
   top: 0;
   }
   .developer {
   position: absolute;
   color: var(--detail-font-color);
   font-weight: 600;
   left: 0;
   top: -100%;
   display: flex;
   transition: 0.3s;
   padding: 0 20px;
   align-items: center;
   justify-content: center;
   background-color: var(--developer-color);
   width: 100%;
   height: 100%;
   }
   .developer img {
   border-radius: 50%;
   width: 26px;
   height: 26px;
   object-fit: cover;
   margin-right: 10px;
   }
   .dark-mode .search-bar input,
   .dark-mode .detail-area input {
   background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 56.966 56.966' fill='%236f7073'%3e%3cpath d='M55.146 51.887L41.588 37.786A22.926 22.926 0 0046.984 23c0-12.682-10.318-23-23-23s-23 10.318-23 23 10.318 23 23 23c4.761 0 9.298-1.436 13.177-4.162l13.661 14.208c.571.593 1.339.92 2.162.92.779 0 1.518-.297 2.079-.837a3.004 3.004 0 00.083-4.242zM23.984 6c9.374 0 17 7.626 17 17s-7.626 17-17 17-17-7.626-17-17 7.626-17 17-17z'/%3e%3c/svg%3e");
   }
   .dark-mode .dark-light svg {
   fill: #ffce45;
   stroke: #ffce45;
   }
   .dark-mode .chat-area-group span {
   color: #d1d1d2;
   }
   .chat-area-group {
   flex-shrink: 0;
   display: flex;
   }
   .chat-area-group * {
   border: 2px solid var(--theme-bg-color);
   }
   .chat-area-group * + * {
   margin-left: -5px;
   }
   .chat-area-group span {
   width: 32px;
   height: 32px;
   background-color: var(--button-bg-color);
   color: var(--theme-color);
   border-radius: 50%;
   display: flex;
   justify-content: center;
   align-items: center;
   font-size: 14px;
   font-weight: 500;
   }
   @media (max-width: 1120px) {
   .detail-area {
   display: none;
   }
   }
   @media (max-width: 780px) {
   .conversation-area {
   display: none;
   }
   .search-bar {
   margin-left: 0;
   flex-grow: 1;
   }
   .search-bar input {
   padding-right: 10px;
   }
   }
   a{
      text-decoration: none;
      color: #000;
   }
   a:hover{
      text-decoration: none
   }
   a:focus{
      background: var(--active-conversation-bg);
      border-left: 4px solid var(--theme-color);
      transition: 0.5s ease-in-out
   }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<div class="app">
   <div class="header">
      <div class="logo">
         LOGO
      </div>
      <div class="search-bar">
         <input type="text" placeholder="Search..." />
      </div>
      <div class="user-settings">
         <div class="dark-light">
            <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
               <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" />
            </svg>
         </div>
         <div class="settings">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
               <circle cx="12" cy="12" r="3" />
               <path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-2 2 2 2 0 01-2-2v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83 0 2 2 0 010-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 01-2-2 2 2 0 012-2h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 010-2.83 2 2 0 012.83 0l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 012-2 2 2 0 012 2v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 0 2 2 0 010 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 012 2 2 2 0 01-2 2h-.09a1.65 1.65 0 00-1.51 1z" />
            </svg>
         </div>
         <img class="user-profile" src="<?= $student_login['picture_link'] ?>" alt="" class="account-profile" alt="">
      </div>
   </div>
   <div class="wrapper">
      <div class="conversation-area">
       <?php

         foreach ($listuser as $key => $value) {
            $last_message = "SELECT * FROM `chat_messages` WHERE incoming_id = ".$value['Admission_NO']." and outgoing_id = ".$student_login['Admission_NO']." UNION SELECT * FROM chat_messages WHERE incoming_id= ".$student_login['Admission_NO']." and outgoing_id=".$value['Admission_NO']." ORDER BY id  DESC LIMIT 1";
            $result = mysqli_query($con,$last_message);
            $lastmessage_row = mysqli_fetch_assoc($result);

            if ($lastmessage_row['outgoing_id'] == $student_login['Admission_NO']) {
               if ($lastmessage_row['messeage_seen_time'] == '') {
                  $lastmessage_row_Diplay =  '<i class="fas fa-check" ></i> '.$lastmessage_row['messages'];
               }else{
                  $lastmessage_row_Diplay =  '<i class="fas fa-check-double" style="color:steelblue"></i> '.$lastmessage_row['messages'];
               }
               
            }else{
               $lastmessage_row_Diplay = $lastmessage_row['messages'];
            }
               ?>
               <a href="javascript:void(0)" id="user_card" onclick="active_card(<?= $value['Admission_NO'] ?>)">
               <div class="msg"> <!-- ONLINE ACTIVE -->
                  <img class="msg-profile" src="<?= $value['picture_link'] ?>" alt="" />
                  <div class="msg-detail">
                     <div class="msg-username"><?= $value['firstname'].' '.$value['last_name'] ?></div>
                     <div class="msg-content">
                        <span class="msg-message"><?= $lastmessage_row_Diplay ?></span>
                        <span class="msg-date">20m</span>
                     </div>
                  </div>
               </div>
            </a>
          <?php
         }

         ?>
         <!--  -->
        
         <div class="overlay"></div>
      </div>
      <div class="chat-area">
         <div class="chat-area-main">
         </div>
      </div>

<script>
   function active_card(admit_no) {
      var admit_no = admit_no
      $.ajax({
         url: "chat_request.php",
         method:"post",
         data:"admit_no="+admit_no,
         success:function(data) {
            $(".chat-area-main").html(data);
            $(".chat-area-main").scrollTop($('.chat-area-main')[0].scrollHeight)   
         }
      })
   }





</script>         
 