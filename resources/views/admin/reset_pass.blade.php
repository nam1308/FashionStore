@extends('admin.layouts.empty')

@section('content')
<template id='ResetPassword'>
    <div class="container">
        <div class="img">
            <img src="data:image/svg+xml,%3csvg id='ae7ad495-543d-4c4b-9483-8059c5566fe6' data-name='Layer 1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='1009.54' height='839.64' viewBox='0 0 1009.54 839.64'%3e%3cdefs%3e%3clinearGradient id='f9d7795c-47ab-4264-adf8-fc9a284cd87a' x1='491.14' y1='640.96' x2='698.09' y2='640.96' gradientUnits='userSpaceOnUse'%3e%3cstop offset='0' stop-color='gray' stop-opacity='0.25'/%3e%3cstop offset='0.54' stop-color='gray' stop-opacity='0.12'/%3e%3cstop offset='1' stop-color='gray' stop-opacity='0.1'/%3e%3c/linearGradient%3e%3c/defs%3e%3ctitle%3epersonalization%3c/title%3e%3cpath d='M681.78%2c141.58c-64.72-2.25-126.36-23.14-185.22-46S379.4%2c47.39%2c316.23%2c35.28c-40.63-7.79-87.1-8.89-119.83%2c12.89-31.51%2c21-41.69%2c57.15-47.16%2c90.73-4.12%2c25.26-6.54%2c51.85%2c4.74%2c75.49%2c7.84%2c16.42%2c21.74%2c30.22%2c31.36%2c45.95%2c33.47%2c54.72%2c9.81%2c122.2-26.45%2c175.63-17%2c25.07-36.75%2c49-49.88%2c75.66s-19.2%2c57.25-7.71%2c84.47c11.38%2c27%2c38.51%2c47.24%2c67.9%2c61.49%2c59.69%2c28.95%2c130%2c37.23%2c198.61%2c41.92%2c151.83%2c10.39%2c304.46%2c5.89%2c456.69%2c1.39%2c56.34-1.67%2c112.92-3.36%2c168.34-12.07%2c30.78-4.84%2c62.55-12.51%2c84.9-31.05%2c28.36-23.53%2c35.39-63.37%2c16.38-92.88-31.88-49.49-120-61.78-142.31-114.89-12.26-29.24.33-61.8%2c18.16-88.92%2c38.24-58.16%2c102.33-109.19%2c105.7-175.67%2c2.32-45.66-28.49-91.39-76.13-113-49.93-22.64-119.18-19.8-156%2c17.69C805.59%2c128.71%2c738.93%2c143.56%2c681.78%2c141.58Z' transform='translate(-95.23 -30.18)' fill='%2338d39f' opacity='0.1'/%3e%3cellipse cx='483.49' cy='780.99' rx='303.97' ry='41.12' fill='%2338d39f' opacity='0.1'/%3e%3cpath d='M428.24%2c688.75s21-3.36%2c33.6%2c11.48c0%2c0-9.24%2c7.28-29.12-2.8Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3cpath d='M426%2c688.42S412.6%2c705%2c419.17%2c723.27c0%2c0%2c10.92-4.37%2c12.11-26.63Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3cpath d='M414%2c661.31s8.4-15.4%2c42%2c6.16c0%2c0-4.48%2c10.36-19.32%2c9.52S417.87%2c669.43%2c414%2c661.31Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3cpath d='M411.79%2c660.2s-17.43-2-19.12%2c37.9c0%2c0%2c11.05%2c2.3%2c18.9-10.33S416.17%2c668.08%2c411.79%2c660.2Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3cpath d='M401.63%2c628.38s9.8-27.17%2c45.37-7.85c0%2c0-8.12%2c24.93-41.73%2c17.09Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3cpath d='M390.71%2c587.77s18.48-27.44%2c51.25-2c0%2c0-11.48%2c25.76-48.45%2c11.76Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3cpath d='M386.79%2c549.13s21.56-25.2%2c54%2c0c0%2c0-20.45%2c22.12-54%2c6.44Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3cpath d='M383.43%2c511.61s21.84-26.33%2c52.93-1.4c0%2c0-24.65%2c23.24-52.93%2c7.56Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3cpath d='M385.39%2c478.28s23-33.88%2c52.09-10.92c0%2c0-24.65%2c29.13-52.09%2c17.36Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3cpath d='M390.71%2c439.36s24.36-33.6%2c52.65-7.84c0%2c0-28.85%2c29.12-52.65%2c14Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3cpath d='M398.84%2c404.57s28.83-31.57%2c54-19c0%2c0-30.06%2c33.53-55.26%2c27.37Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3cpath d='M408.91%2c371.6s33.33-38.65%2c52.65-25.77c0%2c0-24.52%2c30-55%2c33.05Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3cpath d='M423.46%2c333.34s29.14-31.58%2c50.42-23.74c0%2c0-24.92%2c32.77-54.33%2c33.61Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3cpath d='M436.64%2c297.56s32.2-30.24%2c46.2-24.92c0%2c0-23.24%2c33.6-47.6%2c31.64Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3cpath d='M449.52%2c264.52s27.72-36.12%2c42.84-33.32c0%2c0-16.8%2c32.2-42.84%2c37Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3cpath d='M463.49%2c220s24.51-27.7%2c37.74-27.63c0%2c0-19.34%2c37-38.74%2c36.66Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3cpath d='M471.78%2c190.31l23.66-57.68s1.19%2c52.14-26.68%2c68.38Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3cpath d='M481.38%2c126.7s3.92-48.16%2c1.4-52.08c0%2c0%2c16.93%2c40-1.56%2c73.36Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3cpath d='M400.72%2c627.73s-24.55-15.21-40.43%2c22c0%2c0%2c21.84%2c14.5%2c43.31-12.51Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3cpath d='M389.93%2c586.22s-30.1-13.73-44.71%2c25.12c0%2c0%2c23.26%2c16%2c47.45-15.3Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3cpath d='M385.39%2c551.44s-21.56-25.2-54%2c0c0%2c0%2c20.44%2c22.12%2c54%2c6.44Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3cpath d='M382.7%2c511.61s-21.85-26.33-52.93-1.4c0%2c0%2c24.64%2c23.24%2c52.93%2c7.56Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3cpath d='M385.39%2c479.24s-15.32-37.95-48.62-21.63c0%2c0%2c18%2c33.66%2c47.27%2c27.93Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3cpath d='M392.64%2c439.17s-15.22-38.61-49-20.71c0%2c0%2c20.68%2c35.39%2c47.5%2c26.68Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3cpath d='M402.08%2c404.77s-6-42.34-33.95-46.13c0%2c0%2c5.93%2c44.64%2c30.22%2c53.75Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3cpath d='M409.63%2c371.67s-2.35-51-25.5-52.77c0%2c0%2c.78%2c38.7%2c22.89%2c60Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3cpath d='M425.87%2c331.88s-6.91-42.4-29-47.59c0%2c0%2c2.74%2c41.07%2c26.81%2c58Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3cpath d='M439.26%2c297.87s-.24-44.18-13.74-50.67c0%2c0-8.37%2c40%2c9.83%2c56.31Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3cpath d='M450.55%2c264s-1.9-45.5-15.87-51.91c0%2c0-4.79%2c36%2c13.77%2c54.88Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3cpath d='M465.45%2c223.6s-.09-37-10.07-45.68c0%2c0-9.92%2c40.54%2c4.86%2c53.12Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3cpath d='M470.6%2c188.49l-9.7-61.59s-13.2%2c50.47%2c10.16%2c72.7Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3cpath d='M472.5%2c127.28s-24.93-41.39-24.41-46c0%2c0%2c2.64%2c43.4%2c34%2c65Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3cpath d='M475.42%2c115.06S451.9%2c56.25%2c441.26%2c51.49c0%2c0%2c33.6%2c17.08%2c36.12%2c61.89Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3cpath d='M462.36%2c229.35l-1.61-.49c19.85-64.73%2c24.81-106%2c13.95-116.34l1.16-1.22C487.36%2c122.21%2c482.7%2c163%2c462.36%2c229.35Z' transform='translate(-95.23 -30.18)' fill='%23444053'/%3e%3cpath d='M407.7%2c380.87l-2.37-.84c2.1-5.93%2c4.37-11.95%2c6.75-17.89%2c20.72-51.64%2c38.36-99.67%2c49.67-136.55l2.07-1c-11.33%2c36.95-28.65%2c86.83-49.4%2c138.53C412.05%2c369%2c409.79%2c375%2c407.7%2c380.87Z' transform='translate(-95.23 -30.18)' fill='%23444053'/%3e%3cpath d='M457.79%2c737.2c-.32-.36-32.5-36.58-54.92-98.44A364.43%2c364.43%2c0%2c0%2c1%2c381.17%2c526c-1.54-48.13%2c8.56-101.87%2c25.86-150.68l1.88%2c2.2c-38.83%2c109.56-23.4%2c203.45-2.94%2c260%2c22.2%2c61.29%2c54%2c97.13%2c54.32%2c97.48Z' transform='translate(-95.23 -30.18)' fill='%23444053'/%3e%3crect x='642.8' y='289.82' width='8.86' height='73.02' rx='2.29' ry='2.29' fill='%233a3768'/%3e%3crect x='348.37' y='232.61' width='4.97' height='24.04' rx='2.29' ry='2.29' fill='%233a3768'/%3e%3crect x='348.19' y='276.63' width='5.6' height='41.84' rx='2.29' ry='2.29' fill='%233a3768'/%3e%3crect x='348.28' y='333.11' width='5.33' height='42.2' rx='2.29' ry='2.29' fill='%233a3768'/%3e%3crect x='351.18' y='153.17' width='296.4' height='602.39' rx='38.99' ry='38.99' fill='%233a3768'/%3e%3cpath d='M701%2c199H667v4.09a19.38%2c19.38%2c0%2c0%2c1-19.39%2c19.38H539.48a19.38%2c19.38%2c0%2c0%2c1-19.39-19.38V199H488.26a23.54%2c23.54%2c0%2c0%2c0-23.54%2c23.54V746.51a23.54%2c23.54%2c0%2c0%2c0%2c23.54%2c23.54H701a23.54%2c23.54%2c0%2c0%2c0%2c23.54-23.54V222.58A23.54%2c23.54%2c0%2c0%2c0%2c701%2c199Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3crect x='470.79' y='171.16' width='41.39' height='8.4' rx='3.87' ry='3.87' fill='%23e6e8ec'/%3e%3ccircle cx='523.21' cy='175.36' r='4.77' fill='%23e6e8ec'/%3e%3cpath d='M845.43%2c156.93s-84.2-5.08-74.28%2c53.92c0%2c0-2%2c10.43%2c7.48%2c15.16%2c0%2c0%2c.15-4.37%2c8.64-2.88a39.5%2c39.5%2c0%2c0%2c0%2c9.15.44A19.06%2c19.06%2c0%2c0%2c0%2c807.6%2c219h0s23.67-9.78%2c32.87-48.46c0%2c0%2c6.81-8.44%2c6.54-10.61L832.8%2c166s4.86%2c10.25%2c1%2c18.77c0%2c0-.46-18.4-3.19-18-.55.08-7.38%2c3.55-7.38%2c3.55s8.35%2c17.85%2c2.05%2c30.83c0%2c0%2c2.39-22-4.66-29.54l-10%2c5.84s9.76%2c18.44%2c3.14%2c33.49c0%2c0%2c1.7-23.08-5.25-32.07l-9.06%2c7.07s9.17%2c18.17%2c3.58%2c30.65c0%2c0-.73-26.86-5.54-28.89%2c0%2c0-7.93%2c7-9.14%2c9.86%2c0%2c0%2c6.28%2c13.2%2c2.38%2c20.16%2c0%2c0-2.39-17.9-4.35-18%2c0%2c0-7.9%2c11.86-8.72%2c20%2c0%2c0%2c.34-12.09%2c6.81-21.12%2c0%2c0-7.64%2c1.31-12.1%2c6.26%2c0%2c0%2c1.23-8.38%2c14.05-9.12%2c0%2c0%2c6.53-9%2c8.27-9.54%2c0%2c0-12.74-1.07-20.47%2c2.36%2c0%2c0%2c6.8-7.91%2c22.81-4.31l8.95-7.31s-16.78-2.29-23.9.24c0%2c0%2c8.19-7%2c26.31-1.9l9.74-5.82s-14.31-3.08-22.83-2c0%2c0%2c9-4.85%2c25.69.41l7-3.13s-10.48-2.06-13.55-2.39-3.23-1.17-3.23-1.17a36.35%2c36.35%2c0%2c0%2c1%2c19.69%2c2.19S845.68%2c157.86%2c845.43%2c156.93Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3cpath d='M759.06%2c130.69s-38-2.29-33.56%2c24.37c0%2c0-.89%2c4.71%2c3.38%2c6.85%2c0%2c0%2c.07-2%2c3.91-1.31a17.51%2c17.51%2c0%2c0%2c0%2c4.13.2%2c8.56%2c8.56%2c0%2c0%2c0%2c5.05-2.08h0s10.7-4.42%2c14.86-21.9c0%2c0%2c3.07-3.81%2c2.95-4.79l-6.42%2c2.74s2.19%2c4.63.47%2c8.48c0%2c0-.21-8.31-1.44-8.12-.25%2c0-3.34%2c1.61-3.34%2c1.61s3.78%2c8.07.93%2c13.93c0%2c0%2c1.08-9.94-2.11-13.35L743.35%2c140s4.41%2c8.33%2c1.42%2c15.13c0%2c0%2c.77-10.43-2.37-14.49l-4.09%2c3.2s4.14%2c8.21%2c1.62%2c13.85c0%2c0-.34-12.14-2.51-13.06%2c0%2c0-3.58%2c3.16-4.13%2c4.46%2c0%2c0%2c2.84%2c6%2c1.08%2c9.11%2c0%2c0-1.08-8.09-2-8.13%2c0%2c0-3.57%2c5.36-3.94%2c9a19.52%2c19.52%2c0%2c0%2c1%2c3.08-9.54%2c10.76%2c10.76%2c0%2c0%2c0-5.47%2c2.83s.56-3.79%2c6.35-4.12c0%2c0%2c3-4.07%2c3.74-4.32%2c0%2c0-5.76-.48-9.25%2c1.07%2c0%2c0%2c3.07-3.57%2c10.3-1.95l4-3.3s-7.59-1-10.8.11c0%2c0%2c3.7-3.16%2c11.89-.86l4.4-2.63s-6.47-1.39-10.32-.89c0%2c0%2c4.07-2.19%2c11.61.18l3.15-1.41s-4.74-.93-6.13-1.08-1.46-.53-1.46-.53a16.39%2c16.39%2c0%2c0%2c1%2c8.9%2c1S759.18%2c131.11%2c759.06%2c130.69Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3crect x='395.91' y='226.18' width='206.95' height='439.24' opacity='0.1'/%3e%3cpath d='M691.75%2c818.22s-4.88-11.36-7.06-16.6c-1.23-3-3.31-3.5-4.9-3.43l.09-1%2c.39-4.73.08-1c3.77-.79%2c7-1.41%2c7-1.41L685%2c668.73s-1-1.28-3.42-9c-1.2-3.85-7-8.58-12.42-12.35-.85-.59-1.68-1.15-2.5-1.69a62.39%2c62.39%2c0%2c0%2c1%2c6.21-4.58c3.08-1.79%2c4.1-12%2c4.1-12l-.51%2c1c.51-1%2c0-27.07%2c0-27.07l-1.8-27.06s-1.28-32.17-11.28-40.6S640.75%2c524%2c640.75%2c524l-7-1.8h0l-12.9-3.31c-.36-.59-.71-1.21-1-1.86-.13-.25-.25-.51-.37-.77a30.2%2c30.2%2c0%2c0%2c0%2c12.75-24.65%2c29.73%2c29.73%2c0%2c0%2c0-.39-4.84c0-.3-.11-.61-.17-.91a25.2%2c25.2%2c0%2c0%2c0%2c3-2.41%2c13.63%2c13.63%2c0%2c0%2c0%2c3.66-4.49h0a7.57%2c7.57%2c0%2c0%2c0%2c.34-1.05c0-.1%2c0-.2.06-.31s.09-.53.12-.8c0-.1%2c0-.2%2c0-.3%2c0-.29%2c0-.59%2c0-.88%2c0-.07%2c0-.14%2c0-.22%2c0-.33-.05-.66-.1-1a.13.13%2c0%2c0%2c0%2c0-.06h0a17.21%2c17.21%2c0%2c0%2c0-.9-3.4c-1-2.58-2.3-5-2.77-7.75-.58-3.25.09-6.8-1.46-9.72a8.67%2c8.67%2c0%2c0%2c0-6.09-4.19%2c14.35%2c14.35%2c0%2c0%2c0-7.52.86%2c10.7%2c10.7%2c0%2c0%2c1-3.71%2c1%2c7.75%2c7.75%2c0%2c0%2c1-2.71-.66%2c40.19%2c40.19%2c0%2c0%2c1-8.4-4.51%2c40.22%2c40.22%2c0%2c0%2c0-6-3.92%2c8.12%2c8.12%2c0%2c0%2c0-6.92-.28c-3.7%2c1.88-4.4%2c7.12-7.84%2c9.43-2.37%2c1.6-5.46%2c1.44-8.32%2c1.54s-6.1.81-7.51%2c3.29c-1%2c1.72-.76%2c3.77-.57%2c5.78l.06.68c0%2c.24%2c0%2c.49.06.73a18.37%2c18.37%2c0%2c0%2c1-1.13%2c7.56c-1.38%2c3.66-4%2c7.27-3.91%2c11h0a7.66%2c7.66%2c0%2c0%2c0%2c.23%2c1.76%2c8.45%2c8.45%2c0%2c0%2c0%2c.28.85h0a37.24%2c37.24%2c0%2c0%2c0%2c1.85%2c3.61l.09.16c.07.14.14.28.2.42s.18.38.25.57.08.19.11.28.13.37.18.56a5.36%2c5.36%2c0%2c0%2c1%2c.21%2c1.74%2c16.2%2c16.2%2c0%2c0%2c0-.19%2c2.29%2c1.68%2c1.68%2c0%2c0%2c0%2c1.34%2c1.63%2c2.23%2c2.23%2c0%2c0%2c0%2c1.16-.36%2c18.57%2c18.57%2c0%2c0%2c0%2c2.55-1.75c0%2c.32%2c0%2c.64.06%2c1a30.26%2c30.26%2c0%2c0%2c0%2c9.09%2c18.83c0%2c.31%2c0%2c.63-.07%2c1s-.05.72-.07%2c1.09h0l-11.2%2c3.52s.06.2.18.54l-1.18.47h0c-5.81%2c2.35-12.28%2c5.27-15.9%2c7.92-1.6%2c1.16-3.06%2c2.11-4.37%2c2.9a25%2c25%2c0%2c0%2c0-10.36%2c12.55l-.15.38c-1%2c2.29-5.9%2c17.87-5.9%2c17.87s-3.59%2c8.68-4.11%2c14.3c0%2c0-5.9%2c18.63-4.36%2c30.89%2c0%2c0-4.62%2c17.62-2.82%2c20.42%2c0%2c0-1.84%2c7.58%2c6.24%2c15.21-.59.36-1.23.75-1.9%2c1.18-6.26%2c3.94-15.29%2c10.33-16.83%2c15.26-2.39%2c7.67-3.42%2c9-3.42%2c9L501.88%2c789s3.23.62%2c7%2c1.4l.08%2c1%2c.39%2c4.72.09%2c1c-1.59-.07-3.67.48-4.9%2c3.44-2.19%2c5.23-7%2c16.58-7%2c16.58s-10.77%2c10-4.24%2c19.28a6.68%2c6.68%2c0%2c0%2c0%2c1%2c1.16c4.69%2c4.26%2c14.69%2c1.53%2c21.8-1.25a21.26%2c21.26%2c0%2c0%2c0%2c9-7.26%2c3.42%2c3.42%2c0%2c0%2c1%2c2.4-1.33%2c9.8%2c9.8%2c0%2c0%2c0%2c4.47-1.95%2c6%2c6%2c0%2c0%2c0%2c2.46-5%2c.76.76%2c0%2c0%2c1%2c0-.15l-.63-14.23s-.77-9.94-3.22-9.3l-.63.15-.17-1h0l-.33-1.93-.17-1%2c1.36%2c0s.34-11.24%2c4.45-20.08S541.9%2c693%2c541.9%2c693s50.87.83%2c52.57-3.94v0c1%2c0%2c2.09%2c0%2c3.13-.07%2c1.71%2c4.77%2c49.72%2c5%2c49.72%2c5s2.73%2c71.49%2c6.83%2c80.34a40.82%2c40.82%2c0%2c0%2c1%2c2.15%2c5.86h0a65.41%2c65.41%2c0%2c0%2c1%2c2.31%2c14.21l1.36%2c0-.18%2c1-.33%2c1.92-.17%2c1-.65-.15c-2.43-.63-3.2%2c9.31-3.2%2c9.31l-.65%2c14.32a5.81%2c5.81%2c0%2c0%2c0%2c2.38%2c5%2c10%2c10%2c0%2c0%2c0%2c4.55%2c2%2c3.34%2c3.34%2c0%2c0%2c1%2c2.4%2c1.32%2c21.32%2c21.32%2c0%2c0%2c0%2c9%2c7.26c7.68%2c3%2c18.72%2c5.93%2c22.82.1C702.52%2c828.18%2c691.75%2c818.22%2c691.75%2c818.22ZM562.45%2c639.88v0l.12%2c0ZM642.8%2c599s1.29%2c4.85%2c3.59%2c7.4%2c1.16%2c18.39%2c1.16%2c18.39a14.2%2c14.2%2c0%2c0%2c0-2.68.43C643.1%2c614.69%2c641.47%2c603%2c642.8%2c599Z' transform='translate(-95.23 -30.18)' fill='url(%23f9d7795c-47ab-4264-adf8-fc9a284cd87a)'/%3e%3cpolygon points='436.96 768.43 416.85 770.43 416.29 763.7 415.9 759.07 415.35 752.3 434.35 753.3 435.86 761.99 436.18 763.88 436.19 763.88 436.96 768.43' fill='%238e6f7f'/%3e%3cpolygon points='583.41 753.31 582.86 760.07 582.48 764.7 581.91 771.43 561.79 769.43 562.59 764.88 562.9 763 564.41 754.31 583.41 753.31' fill='%238e6f7f'/%3e%3cpath d='M657.33%2c686.1l-59.8%2c2.81q-4.08.2-8.16%2c0l-57.13-2.8V640.85H657.33Z' transform='translate(-95.23 -30.18)' fill='%235f5570'/%3e%3cpath d='M657.33%2c686.1l-59.8%2c2.81q-4.08.2-8.16%2c0l-57.13-2.8V640.85H657.33Z' transform='translate(-95.23 -30.18)' opacity='0.1'/%3e%3cpath d='M580.75%2c518.91s-19.92%2c6.69-27.42%2c12.19c-1.56%2c1.14-3%2c2.08-4.26%2c2.85A24.4%2c24.4%2c0%2c0%2c0%2c539%2c546.23c-.05.14-.1.26-.15.37-1%2c2.25-5.75%2c17.5-5.75%2c17.5s-3.5%2c8.5-4%2c14%2c28.5%2c20.25%2c28.5%2c20.25-14%2c30.5-7.75%2c38.25%2c97.5%2c11.5%2c95.5%2c0-5.5-30.5-3.75-35.75l31-22.5s-1.25-31.5-11-39.75-22-11.25-22-11.25l-19.41-5s-6.84%2c17-14.34%2c19.25S581.92%2c533.46%2c580.75%2c518.91Z' transform='translate(-95.23 -30.18)' fill='%23eaeaf2'/%3e%3cpath d='M608.73%2c547.54s-8.46%2c7.06-12.9%2c0c0%2c0-4%2c11.94%2c0%2c15.94l-.15.81-.71%2c3.56-9.26%2c77L593.33%2c658%2c607.2%2c640.6l-1.12-72-.5-4.13-.12-1h2.37S614.12%2c552.6%2c608.73%2c547.54Z' transform='translate(-95.23 -30.18)' opacity='0.1'/%3e%3cpath d='M610.73%2c547.54s-8.46%2c7.06-12.9%2c0c0%2c0-4%2c11.94%2c0%2c15.94l-.15.81-.71%2c3.56-9.26%2c77L595.33%2c658%2c609.2%2c640.6l-1.12-72-.5-4.13-.12-1h2.37S616.12%2c552.6%2c610.73%2c547.54Z' transform='translate(-95.23 -30.18)' opacity='0.1'/%3e%3cpolygon points='512.97 609.43 499.1 626.8 491.46 613.72 500.73 536.68 501.44 533.12 501.6 532.3 502.85 529.06 511.23 532.3 511.35 533.3 511.85 537.43 512.97 609.43' fill='%23bc8487'/%3e%3cpath d='M531.09%2c792.16a67.93%2c67.93%2c0%2c0%2c1-12.85-1.31c-2.09-.52-4.71-1.1-7.1-1.61l-.56-6.77%2c19%2c1Z' transform='translate(-95.23 -30.18)' opacity='0.1'/%3e%3cpath d='M594.48%2c689c-1.66%2c4.67-51.24%2c3.85-51.24%2c3.85s-2.66%2c70-6.66%2c78.67-4.34%2c19.66-4.34%2c19.66-8.66%2c0-14-1.33-14-3-14-3l2.34-118.75s1-1.25%2c3.33-8.76c1.5-4.83%2c10.3-11.09%2c16.39-15%2c3.4-2.14%2c5.94-3.54%2c5.94-3.54l29.58%2c1.2%2c18.26.74S596.15%2c684.33%2c594.48%2c689Z' transform='translate(-95.23 -30.18)' fill='%235f5570'/%3e%3cpath d='M532.2%2c798.6l-20.12%2c2-.57-6.73a6%2c6%2c0%2c0%2c1%2c2.19.48c3.67%2c2.64%2c14.16.54%2c17.71-.3h0Z' transform='translate(-95.23 -30.18)' opacity='0.1'/%3e%3cpath d='M536%2c818.05a5.87%2c5.87%2c0%2c0%2c1-2.41%2c4.89%2c9.55%2c9.55%2c0%2c0%2c1-4.35%2c1.91%2c3.25%2c3.25%2c0%2c0%2c0-2.33%2c1.3%2c20.87%2c20.87%2c0%2c0%2c1-8.8%2c7.11c-6.93%2c2.72-16.68%2c5.39-21.25%2c1.22a6.32%2c6.32%2c0%2c0%2c1-1-1.13c-6.37-9.12%2c4.13-18.88%2c4.13-18.88s4.74-11.12%2c6.87-16.24a5%2c5%2c0%2c0%2c1%2c6.87-2.88c4%2c2.88%2c16.13.12%2c18.5-.49s3.13%2c9.11%2c3.13%2c9.11L536%2c817.9A.76.76%2c0%2c0%2c0%2c536%2c818.05Z' transform='translate(-95.23 -30.18)' fill='%23bc8487'/%3e%3cpath d='M678.65%2c783.48l-.56%2c6.76c-2.39.51-5%2c1.09-7.11%2c1.61a68.11%2c68.11%2c0%2c0%2c1-12.84%2c1.32l1.51-8.69Z' transform='translate(-95.23 -30.18)' opacity='0.1'/%3e%3cpath d='M685%2c787.85s-8.66%2c1.67-14%2c3-14%2c1.33-14%2c1.33-.33-11-4.33-19.66S646%2c693.85%2c646%2c693.85s-46.78-.27-48.45-4.94%2c20.39-45%2c20.39-45l13.45-.7L657%2c641.85s5%2c2.72%2c10.24%2c6.39%2c10.93%2c8.33%2c12.1%2c12.1c2.33%2c7.51%2c3.33%2c8.76%2c3.33%2c8.76Z' transform='translate(-95.23 -30.18)' fill='%235f5570'/%3e%3cpath d='M677.71%2c794.87l-.56%2c6.73-20.13-2%2c.8-4.55c3.55.85%2c14%2c2.94%2c17.7.3A6%2c6%2c0%2c0%2c1%2c677.71%2c794.87Z' transform='translate(-95.23 -30.18)' opacity='0.1'/%3e%3cpath d='M675.52%2c796.35a5%2c5%2c0%2c0%2c1%2c6.88%2c2.88c2.12%2c5.12%2c6.87%2c16.25%2c6.87%2c16.25s10.5%2c9.75%2c4.13%2c18.87c-4%2c5.72-14.76%2c2.85-22.24-.09a20.74%2c20.74%2c0%2c0%2c1-8.8-7.11%2c3.26%2c3.26%2c0%2c0%2c0-2.34-1.3%2c9.81%2c9.81%2c0%2c0%2c1-4.44-2%2c5.72%2c5.72%2c0%2c0%2c1-2.31-4.88l.63-14s.75-9.73%2c3.12-9.12S671.52%2c799.23%2c675.52%2c796.35Z' transform='translate(-95.23 -30.18)' fill='%23bc8487'/%3e%3cpath d='M623.83%2c527.35l-20.19%2c21.4-.56.6-.73-.43c-4.22-2.5-25.33-15.24-23.52-19.07%2c1-2.18%2c1.59-6.72%2c1.9-10.63%2c0-.47.06-.93.1-1.38.2-3.09.25-5.49.25-5.49s38-6.5%2c36.5%2c0c-.61%2c2.63.3%2c5.59%2c1.59%2c8.18.38.75.8%2c1.46%2c1.21%2c2.13A33%2c33%2c0%2c0%2c0%2c623.83%2c527.35Z' transform='translate(-95.23 -30.18)' fill='%23ffc4d0'/%3e%3cpath d='M619.17%2c520.53a29.65%2c29.65%2c0%2c0%2c1-38.34-2.69c.2-3.09.25-5.49.25-5.49s38-6.5%2c36.5%2c0C617%2c515%2c617.88%2c517.94%2c619.17%2c520.53Z' transform='translate(-95.23 -30.18)' opacity='0.1'/%3e%3cpath d='M631.24%2c495.64A29.67%2c29.67%2c0%2c0%2c1%2c572%2c498.46q-.12-1.4-.12-2.82a29.67%2c29.67%2c0%2c1%2c1%2c59.33%2c0Z' transform='translate(-95.23 -30.18)' fill='%23ffc4d0'/%3e%3cpath d='M630.87%2c490.9a7.1%2c7.1%2c0%2c0%2c1-5.58%2c1.51c-4.58-1-6.15-8-10.83-8.48s-7.79%2c6-12.53%2c5.87c-2-.05-3.8-1.36-5.64-2.27-3.22-1.59-8.52-2.56-12-1.36-5.23%2c1.79-7%2c6.63-10.34%2c10.48a15.25%2c15.25%2c0%2c0%2c1-1.87%2c1.81q-.12-1.4-.12-2.82a29.67%2c29.67%2c0%2c0%2c1%2c59-4.74Z' transform='translate(-95.23 -30.18)' opacity='0.1'/%3e%3cpath d='M596.29%2c486.54c1.84.9%2c3.6%2c2.22%2c5.64%2c2.27%2c4.73.12%2c7.82-6.39%2c12.52-5.88s6.25%2c7.45%2c10.85%2c8.48c3.09.7%2c6-1.61%2c8.31-3.76a13.23%2c13.23%2c0%2c0%2c0%2c3.57-4.39c1-2.48.48-5.34-.45-7.86s-2.24-4.94-2.7-7.59c-.56-3.18.09-6.66-1.42-9.52a8.43%2c8.43%2c0%2c0%2c0-5.94-4.1%2c14%2c14%2c0%2c0%2c0-7.33.83%2c10.37%2c10.37%2c0%2c0%2c1-3.61%2c1%2c7.64%2c7.64%2c0%2c0%2c1-2.65-.65%2c39.13%2c39.13%2c0%2c0%2c1-8.18-4.41%2c38.35%2c38.35%2c0%2c0%2c0-5.83-3.84%2c7.86%2c7.86%2c0%2c0%2c0-6.74-.27c-3.6%2c1.84-4.29%2c7-7.64%2c9.23-2.31%2c1.56-5.32%2c1.4-8.1%2c1.51s-6%2c.78-7.32%2c3.21c-1.18%2c2.09-.59%2c4.66-.44%2c7.05a18.1%2c18.1%2c0%2c0%2c1-1.11%2c7.4c-1.55%2c4.14-4.7%2c8.22-3.58%2c12.5.73%2c2.81%2c3.25%2c5.14%2c3.1%2c8a15.25%2c15.25%2c0%2c0%2c0-.19%2c2.23%2c1.65%2c1.65%2c0%2c0%2c0%2c1.31%2c1.6%2c2%2c2%2c0%2c0%2c0%2c1.12-.36%2c16.72%2c16.72%2c0%2c0%2c0%2c4.41-3.57c3.38-3.86%2c5.13-8.69%2c10.36-10.48C587.78%2c484%2c593.07%2c484.94%2c596.29%2c486.54Z' transform='translate(-95.23 -30.18)' fill='%238e6f7f'/%3e%3cpath d='M630.7%2c661.1l-5.4%2c1.47L612.83%2c666a30.13%2c30.13%2c0%2c0%2c1-9.59%2c4.77c-7.63%2c1.93-12.56-2.27-16.66-8.77-1.65-2.6-.82-4.68%2c1.34-6.31%2c5.2-3.93%2c18.06-5.21%2c22-4.69a16.46%2c16.46%2c0%2c0%2c0%2c7.59-1.18%2c29.4%2c29.4%2c0%2c0%2c0%2c4.91-2.32Z' transform='translate(-95.23 -30.18)' fill='%23ffc4d0'/%3e%3cpath d='M630.7%2c661.1l-5.4%2c1.47c-1.55-4.67-4.1-10.53-7.75-12.78a29.4%2c29.4%2c0%2c0%2c0%2c4.91-2.32Z' transform='translate(-95.23 -30.18)' opacity='0.1'/%3e%3cpath d='M667.22%2c648.24c-2.24%2c1.81-4.14%2c3.46-4.14%2c3.46s-26%2c8.15-31%2c18.4c0%2c0-4-20-12.5-20.25%2c0%2c0%2c9.15-3.59%2c11.79-6.66L657%2c641.85S662%2c644.57%2c667.22%2c648.24Z' transform='translate(-95.23 -30.18)' opacity='0.1'/%3e%3cpath d='M666.83%2c569.85l5.75%2c8.5%2c1.75%2c26.5s.5%2c25.5%2c0%2c26.5l.5-1s-1%2c10-4%2c11.75-9.75%2c7.6-9.75%2c7.6-26%2c8.15-31%2c18.4c0%2c0-4-20-12.5-20.25%2c0%2c0%2c12.75-5%2c12.5-8.25%2c0%2c0%2c9.75-8.75%2c10.5-11s5.62-2.5%2c5.62-2.5%2c1.13-15.5-1.12-18-3.5-7.25-3.5-7.25Z' transform='translate(-95.23 -30.18)' fill='%23eaeaf2'/%3e%3cpath d='M603.24%2c670.74c-7.63%2c1.93-12.56-2.27-16.66-8.77-1.65-2.6-.82-4.68%2c1.34-6.31l.78.31S602.45%2c661.93%2c603.24%2c670.74Z' transform='translate(-95.23 -30.18)' opacity='0.1'/%3e%3cpath d='M600.08%2c678.73c-9%2c12.5-25.75-4.88-27-8.38-.45-1.27-2.16-2.4-4.13-3.31a44.58%2c44.58%2c0%2c0%2c0-7.75-2.57l14.88-12.12%2c2.85%2c1.14L587.7%2c657S609.08%2c666.23%2c600.08%2c678.73Z' transform='translate(-95.23 -30.18)' fill='%23ffc4d0'/%3e%3cpath d='M578.93%2c653.49c-8.2%2c3.9-9.95%2c9.51-10%2c13.55a44.58%2c44.58%2c0%2c0%2c0-7.75-2.57l14.88-12.12Z' transform='translate(-95.23 -30.18)' opacity='0.1'/%3e%3cpath d='M565.83%2c675.1s-24-19-35.5-27.25a28.12%2c28.12%2c0%2c0%2c1-4-3.46c3.4-2.14%2c5.94-3.54%2c5.94-3.54l29.58%2c1.2c.79%2c1.37%2c1.26%2c2.3%2c1.26%2c2.3l16%2c10.5C559.83%2c661.1%2c565.83%2c675.1%2c565.83%2c675.1Z' transform='translate(-95.23 -30.18)' opacity='0.1'/%3e%3cpath d='M533.83%2c575.35l-4.75%2c2.75s-5.75%2c18.25-4.25%2c30.25c0%2c0-4.5%2c17.25-2.75%2c20%2c0%2c0-2.25%2c9.25%2c9.25%2c17.5s35.5%2c27.25%2c35.5%2c27.25-6-14%2c13.25-20.25l-16-10.5s-5.37-10.66-10.5-13c0%2c0-4-4-1.5-6.75s4.5-5.75%2c4.5-8.5%2c1-15.75%2c1-15.75l3-14Z' transform='translate(-95.23 -30.18)' fill='%23eaeaf2'/%3e%3cpath d='M606.58%2c563.47h-9.75a1.29%2c1.29%2c0%2c0%2c1-.16-.18l.16-.82%2c1.25-3.24%2c8.38%2c3.24Z' transform='translate(-95.23 -30.18)' opacity='0.1'/%3e%3cpath d='M609.73%2c546.54s-8.46%2c7.06-12.9%2c0c0%2c0-4%2c11.94%2c0%2c15.94h12S615.12%2c551.6%2c609.73%2c546.54Z' transform='translate(-95.23 -30.18)' fill='%23bc8487'/%3e%3cpath d='M621.17%2c523.35l12.6%2c3.25s-11.94%2c31-14.57%2c31l-15.12-7.25Z' transform='translate(-95.23 -30.18)' opacity='0.1'/%3e%3cpath d='M623.83%2c527.35l-20.19%2c21.4-.56.6-.73-.43L620%2c522l.43.71A33%2c33%2c0%2c0%2c0%2c623.83%2c527.35Z' transform='translate(-95.23 -30.18)' opacity='0.1'/%3e%3cpath d='M620.17%2c522.35l12.6%2c3.25s-11.94%2c31-14.57%2c31l-15.12-7.25Z' transform='translate(-95.23 -30.18)' fill='%23eaeaf2'/%3e%3cpath d='M579.75%2c519.91l-10.92%2c3.44s10.75%2c32.5%2c13.75%2c34.25l19.5-7.25Z' transform='translate(-95.23 -30.18)' opacity='0.1'/%3e%3cpath d='M603.64%2c548.75l-.56.6s-26.25-15.25-24.25-19.5c1-2.18%2c1.59-6.72%2c1.9-10.63l0-.61Z' transform='translate(-95.23 -30.18)' opacity='0.1'/%3e%3cpath d='M580.75%2c518.91l-10.92%2c3.44s10.75%2c32.5%2c13.75%2c34.25l19.5-7.25Z' transform='translate(-95.23 -30.18)' fill='%23eaeaf2'/%3e%3cpath d='M554.74%2c572s6.58%2c1.17%2c6.46%2c8%2c2.71-8.83%2c2.71-8.83Z' transform='translate(-95.23 -30.18)' opacity='0.1'/%3e%3cpath d='M556.24%2c593s-1.83%2c10.33%2c0%2c19.67%2c1.67%2c12.5%2c3.09%2c13S556.24%2c593%2c556.24%2c593Z' transform='translate(-95.23 -30.18)' opacity='0.1'/%3e%3cpath d='M640.24%2c592a3.62%2c3.62%2c0%2c0%2c0-3%2c4.67C638.08%2c600.85%2c640.24%2c592%2c640.24%2c592Z' transform='translate(-95.23 -30.18)' opacity='0.1'/%3e%3cpath d='M525.91%2c627s21.43-1.83%2c25%2c2S525.91%2c627%2c525.91%2c627Z' transform='translate(-95.23 -30.18)' opacity='0.1'/%3e%3cpath d='M650.24%2c628.45s15.67-1.93%2c19.34.74' transform='translate(-95.23 -30.18)' opacity='0.1'/%3e%3cpath d='M656.58%2c631s9.33.33%2c11.5%2c1.5' transform='translate(-95.23 -30.18)' opacity='0.1'/%3e%3cpath d='M658.41%2c634.35s8.5-.33%2c9.67%2c1' transform='translate(-95.23 -30.18)' opacity='0.1'/%3e%3cpath d='M538.54%2c681.35s7.28%2c3.79%2c6.54%2c7.66S538.54%2c681.35%2c538.54%2c681.35Z' transform='translate(-95.23 -30.18)' opacity='0.1'/%3e%3cpath d='M532.24%2c683.19s11.11%2c14.41%2c9.6%2c19.16S532.24%2c683.19%2c532.24%2c683.19Z' transform='translate(-95.23 -30.18)' opacity='0.1'/%3e%3cpath d='M651.33%2c685.58s-5.5%2c4.53-5.35%2c8.27' transform='translate(-95.23 -30.18)' opacity='0.1'/%3e%3cpath d='M524.33%2c774.85s0%2c4.25%2c7.87%2c10.5' transform='translate(-95.23 -30.18)' opacity='0.1'/%3e%3cpath d='M663.24%2c764.85s-.84%2c8.84-8.5%2c13.42' transform='translate(-95.23 -30.18)' opacity='0.1'/%3e%3cg opacity='0.1'%3e%3cpath d='M568.83%2c464.81c0-.69-.12-1.4-.18-2.1a20.17%2c20.17%2c0%2c0%2c0%2c.14%2c4.58A18.64%2c18.64%2c0%2c0%2c0%2c568.83%2c464.81Z' transform='translate(-95.23 -30.18)'/%3e%3cpath d='M567.24%2c492.75c.15-2.9-2.37-5.23-3.1-8a2.7%2c2.7%2c0%2c0%2c1-.08-.41%2c7.71%2c7.71%2c0%2c0%2c0%2c.08%2c3.41c.59%2c2.29%2c2.37%2c4.25%2c2.93%2c6.47C567.12%2c493.7%2c567.22%2c493.23%2c567.24%2c492.75Z' transform='translate(-95.23 -30.18)'/%3e%3cpath d='M637.18%2c480.26a13.33%2c13.33%2c0%2c0%2c1-3.57%2c4.39c-2.33%2c2.15-5.22%2c4.46-8.31%2c3.76-4.59-1-6.17-8-10.85-8.48s-7.79%2c6-12.52%2c5.87c-2-.05-3.8-1.36-5.64-2.27-3.22-1.59-8.51-2.56-12-1.36-5.23%2c1.79-7%2c6.63-10.36%2c10.48a16.87%2c16.87%2c0%2c0%2c1-4.4%2c3.58%2c2.12%2c2.12%2c0%2c0%2c1-1.13.35%2c1.39%2c1.39%2c0%2c0%2c1-1.12-.9v.07a15.39%2c15.39%2c0%2c0%2c0-.19%2c2.24%2c1.65%2c1.65%2c0%2c0%2c0%2c1.31%2c1.59%2c2.12%2c2.12%2c0%2c0%2c0%2c1.13-.35%2c16.87%2c16.87%2c0%2c0%2c0%2c4.4-3.58c3.38-3.85%2c5.13-8.69%2c10.36-10.48%2c3.53-1.2%2c8.82-.23%2c12%2c1.36%2c1.84.91%2c3.6%2c2.22%2c5.64%2c2.27%2c4.73.12%2c7.82-6.39%2c12.52-5.87s6.26%2c7.44%2c10.85%2c8.48c3.09.7%2c6-1.61%2c8.31-3.76a13.33%2c13.33%2c0%2c0%2c0%2c3.57-4.39%2c8.44%2c8.44%2c0%2c0%2c0%2c.43-4.54A7.07%2c7.07%2c0%2c0%2c1%2c637.18%2c480.26Z' transform='translate(-95.23 -30.18)'/%3e%3c/g%3e%3cpath d='M500%2c814.48s8.17-2.52%2c11.56%2c2.26' transform='translate(-95.23 -30.18)' opacity='0.1'/%3e%3cpath d='M689.27%2c815.48s-13.53-.79-13%2c2.87' transform='translate(-95.23 -30.18)' opacity='0.1'/%3e%3cellipse cx='864.17' cy='773.34' rx='26.93' ry='4.55' fill='%2338d39f' opacity='0.1'/%3e%3cellipse cx='91.09' cy='810.68' rx='26.93' ry='4.55' fill='%2338d39f' opacity='0.1'/%3e%3cellipse cx='195.26' cy='835.09' rx='26.93' ry='4.55' fill='%2338d39f' opacity='0.1'/%3e%3cellipse cx='805.22' cy='822.1' rx='40.21' ry='6.8' fill='%2338d39f'/%3e%3cpath d='M917.08%2c841.16a11.71%2c11.71%2c0%2c0%2c0%2c3.83-5.79c.5-2.29-.48-5-2.68-5.89-2.46-.94-5.09.77-7.08%2c2.49s-4.28%2c3.69-6.89%2c3.32a10.48%2c10.48%2c0%2c0%2c0%2c3.25-9.81%2c4.13%2c4.13%2c0%2c0%2c0-.91-2c-1.36-1.46-3.84-.84-5.47.32-5.2%2c3.65-6.65%2c10.72-6.68%2c17.07-.53-2.29-.08-4.68-.1-7s-.65-5-2.64-6.23a7.94%2c7.94%2c0%2c0%2c0-4-.94c-2.34-.09-4.94.15-6.54%2c1.86-2%2c2.12-1.46%2c5.68.26%2c8s4.35%2c3.81%2c6.77%2c5.42a15%2c15%2c0%2c0%2c1%2c4.83%2c4.61%2c4.16%2c4.16%2c0%2c0%2c1%2c.36.83H908A41.06%2c41.06%2c0%2c0%2c0%2c917.08%2c841.16Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3cpath d='M291.88%2c753.45s5.5%2c7.19-2.53%2c18-14.65%2c20-12%2c26.77c0%2c0%2c12.12-20.15%2c22-20.43S302.73%2c765.57%2c291.88%2c753.45Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3cpath d='M291.88%2c753.45a8.83%2c8.83%2c0%2c0%2c1%2c1.12%2c2.26c9.62%2c11.3%2c14.75%2c21.85%2c5.5%2c22.11-8.61.25-18.94%2c15.65-21.42%2c19.54.08.3.18.59.29.89%2c0%2c0%2c12.12-20.15%2c22-20.43S302.73%2c765.57%2c291.88%2c753.45Z' transform='translate(-95.23 -30.18)' opacity='0.1'/%3e%3cpath d='M302.09%2c762.61c0%2c2.53-.28%2c4.58-.63%2c4.58s-.63-2.05-.63-4.58.35-1.34.7-1.34S302.09%2c760.08%2c302.09%2c762.61Z' transform='translate(-95.23 -30.18)' fill='%23ffd037'/%3e%3cpath d='M305.6%2c765.63c-2.22%2c1.21-4.16%2c1.94-4.32%2c1.63s1.49-1.54%2c3.71-2.75%2c1.35-.33%2c1.51%2c0S307.82%2c764.42%2c305.6%2c765.63Z' transform='translate(-95.23 -30.18)' fill='%23ffd037'/%3e%3cpath d='M262.87%2c753.45s-5.5%2c7.19%2c2.53%2c18%2c14.65%2c20%2c12%2c26.77c0%2c0-12.11-20.15-22-20.43S252%2c765.57%2c262.87%2c753.45Z' transform='translate(-95.23 -30.18)' fill='%2338d39f'/%3e%3cpath d='M262.87%2c753.45a9%2c9%2c0%2c0%2c0-1.13%2c2.26c-9.62%2c11.3-14.74%2c21.85-5.5%2c22.11%2c8.62.25%2c18.95%2c15.65%2c21.43%2c19.54a7.76%2c7.76%2c0%2c0%2c1-.3.89s-12.11-20.15-22-20.43S252%2c765.57%2c262.87%2c753.45Z' transform='translate(-95.23 -30.18)' opacity='0.1'/%3e%3cpath d='M252.65%2c762.61c0%2c2.53.29%2c4.58.64%2c4.58s.63-2.05.63-4.58-.35-1.34-.7-1.34S252.65%2c760.08%2c252.65%2c762.61Z' transform='translate(-95.23 -30.18)' fill='%23ffd037'/%3e%3cpath d='M249.15%2c765.63c2.22%2c1.21%2c4.15%2c1.94%2c4.32%2c1.63s-1.5-1.54-3.72-2.75-1.34-.33-1.51%2c0S246.93%2c764.42%2c249.15%2c765.63Z' transform='translate(-95.23 -30.18)' fill='%23ffd037'/%3e%3cpath d='M254.4%2c797.31s15.36-.48%2c20-3.77%2c23.63-7.24%2c24.77-1.95%2c23.09%2c26.29%2c5.75%2c26.43-40.3-2.7-44.92-5.51S254.4%2c797.31%2c254.4%2c797.31Z' transform='translate(-95.23 -30.18)' fill='%23a8a8a8'/%3e%3cpath d='M305.22%2c816.18c-17.34.14-40.3-2.7-44.92-5.51-3.51-2.15-4.92-9.84-5.39-13.38l-.51%2c0s1%2c12.38%2c5.59%2c15.2%2c27.58%2c5.65%2c44.92%2c5.51c5%2c0%2c6.73-1.82%2c6.64-4.46C310.85%2c815.16%2c308.94%2c816.15%2c305.22%2c816.18Z' transform='translate(-95.23 -30.18)' opacity='0.2'/%3e%3c/svg%3e">
        </div>
        <div class="login-content">
            <form action="{{route('admin.resetPassword')}}" method="POST">
                @csrf
                <img src="data:image/svg+xml,%3csvg id='457bf273-24a3-4fd8-a857-e9b918267d6a' data-name='Layer 1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='698' height='698' viewBox='0 0 698 698'%3e%3cdefs%3e%3clinearGradient id='b247946c-c62f-4d08-994a-4c3d64e1e98f' x1='349' y1='698' x2='349' gradientUnits='userSpaceOnUse'%3e%3cstop offset='0' stop-color='gray' stop-opacity='0.25'/%3e%3cstop offset='0.54' stop-color='gray' stop-opacity='0.12'/%3e%3cstop offset='1' stop-color='gray' stop-opacity='0.1'/%3e%3c/linearGradient%3e%3c/defs%3e%3ctitle%3eprofile pic%3c/title%3e%3cg opacity='0.5'%3e%3ccircle cx='349' cy='349' r='349' fill='url(%23b247946c-c62f-4d08-994a-4c3d64e1e98f)'/%3e%3c/g%3e%3ccircle cx='349.68' cy='346.77' r='341.64' fill='%23f5f5f5'/%3e%3cpath d='M601%2c790.76a340%2c340%2c0%2c0%2c0%2c187.79-56.2c-12.59-68.8-60.5-72.72-60.5-72.72H464.09s-45.21%2c3.71-59.33%2c67A340.07%2c340.07%2c0%2c0%2c0%2c601%2c790.76Z' transform='translate(-251 -101)' fill='%2338d39f'/%3e%3ccircle cx='346.37' cy='339.57' r='164.9' fill='%23333'/%3e%3cpath d='M293.15%2c476.92H398.81a0%2c0%2c0%2c0%2c1%2c0%2c0v84.53A52.83%2c52.83%2c0%2c0%2c1%2c346%2c614.28h0a52.83%2c52.83%2c0%2c0%2c1-52.83-52.83V476.92a0%2c0%2c0%2c0%2c1%2c0%2c0Z' opacity='0.1'/%3e%3cpath d='M296.5%2c473h99a3.35%2c3.35%2c0%2c0%2c1%2c3.35%2c3.35v81.18A52.83%2c52.83%2c0%2c0%2c1%2c346%2c610.37h0a52.83%2c52.83%2c0%2c0%2c1-52.83-52.83V476.35A3.35%2c3.35%2c0%2c0%2c1%2c296.5%2c473Z' fill='%23fdb797'/%3e%3cpath d='M544.34%2c617.82a152.07%2c152.07%2c0%2c0%2c0%2c105.66.29v-13H544.34Z' transform='translate(-251 -101)' opacity='0.1'/%3e%3ccircle cx='346.37' cy='372.44' r='151.45' fill='%23fdb797'/%3e%3cpath d='M489.49%2c335.68S553.32%2c465.24%2c733.37%2c390l-41.92-65.73-74.31-26.67Z' transform='translate(-251 -101)' opacity='0.1'/%3e%3cpath d='M489.49%2c333.78s63.83%2c129.56%2c243.88%2c54.3l-41.92-65.73-74.31-26.67Z' transform='translate(-251 -101)' fill='%23333'/%3e%3cpath d='M488.93%2c325a87.49%2c87.49%2c0%2c0%2c1%2c21.69-35.27c29.79-29.45%2c78.63-35.66%2c103.68-69.24%2c6%2c9.32%2c1.36%2c23.65-9%2c27.65%2c24-.16%2c51.81-2.26%2c65.38-22a44.89%2c44.89%2c0%2c0%2c1-7.57%2c47.4c21.27%2c1%2c44%2c15.4%2c45.34%2c36.65.92%2c14.16-8%2c27.56-19.59%2c35.68s-25.71%2c11.85-39.56%2c14.9C608.86%2c369.7%2c462.54%2c407.07%2c488.93%2c325Z' transform='translate(-251 -101)' fill='%23333'/%3e%3cellipse cx='194.86' cy='372.3' rx='14.09' ry='26.42' fill='%23fdb797'/%3e%3cellipse cx='497.8' cy='372.3' rx='14.09' ry='26.42' fill='%23fdb797'/%3e%3c/svg%3e">
                <h2 class="title">Reset Password</h2>
                   <div class="input-div one">
                      <div class="i">
                           <i class="fas fa-lock"></i>
                      </div>
                      <div class="div">
                              <h5>New password</h5>
                              <input type="password" class="input" v-model="password">
                      </div>
                   </div>
                   <p v-if="error?.password" class="alert alert-danger">@{{error?.password}}</p>
                   <div class="input-div pass">
                      <div class="i">
                           <i class="fas fa-check"></i>
                      </div>
                      <div class="div">
                           <h5>Confirm password</h5>
                           <input type="password" class="input" v-model="confirmPassword">
                      </div>
                    </div>
                   <p v-if="error?.confirmPassword" class="alert alert-danger">@{{error?.confirmPassword}}</p>
                <input type="submit" class="btn" value="Submit" @click.prevent='handleSubmit'>
            </form>
        </div>
    </div>
</template>

<style id='style'>
*{
	padding: 0;
	margin: 0;
	box-sizing: border-box;
}

body{
    font-family: 'Poppins', sans-serif;
    overflow: hidden;
}

.content {
    max-width: none;
}

.wave{
	position: fixed;
	bottom: 0;
	left: 0;
	height: 100%;
	z-index: -1;
}

.container{
    width: 100vw;
    height: 100vh;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-gap :7rem;
    padding: 0 2rem;
}

.img{
	display: flex;
	justify-content: flex-end;
	align-items: center;
}

.login-content{
	display: flex;
	justify-content: center;
	align-items: center;
	text-align: center;
}

.img img{
	width: 500px;
}

form{
	width: 360px;
}

.login-content img{
    height: 100px;
}

.login-content h2{
	margin: 15px 0;
	color: #333;
	text-transform: uppercase;
	font-size: 2.9rem;
}

.login-content .input-div{
	position: relative;
    display: grid;
    grid-template-columns: 7% 93%;
    margin: 25px 0;
    padding: 5px 0;
    border-bottom: 2px solid #d9d9d9;
}

.login-content .input-div.one{
	margin-top: 0;
}

.i{
	color: #d9d9d9;
	display: flex;
	justify-content: center;
	align-items: center;
}

.i i{
	transition: .3s;
}

.input-div > div{
    position: relative;
	height: 45px;
}

.input-div > div > h5{
	position: absolute;
	left: 10px;
	top: 50%;
	transform: translateY(-50%);
	color: #999;
	font-size: 18px;
	transition: .3s;
}

.input-div:before, .input-div:after{
	content: '';
	position: absolute;
	bottom: -2px;
	width: 0%;
	height: 2px;
	background-color: #38d39f;
	transition: .4s;
}

.input-div:before{
	right: 50%;
}

.input-div:after{
	left: 50%;
}

.input-div.focus:before, .input-div.focus:after{
	width: 50%;
}

.input-div.focus > div > h5{
	top: -5px;
	font-size: 15px;
}

.input-div.focus > .i > i{
	color: #38d39f;
}

.input-div > div > input{
	position: absolute;
	left: 0;
	top: 0;
	width: 100%;
	height: 100%;
	border: none;
	outline: none;
	background: none;
	padding: 0.5rem 0.7rem;
	font-size: 1.2rem;
	color: #555;
	font-family: 'poppins', sans-serif;
}

.input-div.pass{
	margin-bottom: 4px;
}

a{
	display: block;
	text-align: right;
	text-decoration: none;
	color: #999;
	font-size: 0.9rem;
	transition: .3s;
}

a:hover{
	color: #38d39f;
}

.btn{
	display: block;
	width: 100%;
	height: 50px;
	border-radius: 25px;
	outline: none;
	border: none;
	background-image: linear-gradient(to right, #32be8f, #38d39f, #32be8f);
	background-size: 200%;
	font-size: 1.2rem;
	color: #fff;
	font-family: 'Poppins', sans-serif;
	text-transform: uppercase;
	margin: 1rem 0;
	cursor: pointer;
	transition: 777ms;
}
.btn:hover{
	background-position: right;
	display: block;
	background-image: linear-gradient(to left, aqua, #38d39f, lightcyan);
	transform: scale(104%);
}


@media screen and (max-width: 1050px){
	.container{
		grid-gap: 5rem;
	}
}

@media screen and (max-width: 1000px){
	form{
		width: 290px;
	}

	.login-content h2{
        font-size: 2.4rem;
        margin: 8px 0;
	}

	.img img{
		width: 400px;
	}
}

@media screen and (max-width: 900px){
	.container{
		grid-template-columns: 1fr;
	}

	.img{
		display: none;
	}

	.wave{
		display: none;
	}

	.login-content{
		justify-content: center;
	}
}

</style>
@stop

@push('vue')
    <script>
        Vue.createApp({
            template: '#ResetPassword',
            data() {
                return {
                    password: '',
                    confirmPassword: '',
                    error: {
                        password: '',
                        confirmPassword: '',
                    }
                }
            },
            methods: {
                handleSubmit(){
                    if (this.error && !this.error?.password && !this.error?.confirmPassword){
                        console.log('submited!')
                    }
                }
            },
            watch: {
                password: {
                    deep: true,
                    handler(newValue, oldValue) {
                        if (!newValue){
                            this.error = 
                            {
                                password: 'Bạn chưa nhập mật khẩu'
                            }
                        }
                        else if (!/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/.test(newValue)){
                            this.error.password = 'Mật khẩu phải bao gồm chữ và số với độ dài lớn hơn 7 ký tự'
                        }
                        else{
                            this.error.password = null
                        }
                    }
                },
                confirmPassword: {
                    deep: true,
                    handler(newValue, oldValue) {
                        if (newValue!==this.password){
                            this.error.confirmPassword = 'Hai mật khẩu không khớp'
                        }
                        else{
                            this.error.confirmPassword = null
                        }
                    }
                }
            },
            style: '#style'
        }).mount('#app')
    </script>
@endpush

@push('vue')
    <script>
        const inputs = document.querySelectorAll(".input");

        function addcl(){
            let parent = this.parentNode.parentNode;
            parent.classList.add("focus");
        }

        function remcl(){
            let parent = this.parentNode.parentNode;
            if(this.value == ""){
                parent.classList.remove("focus");
            }
        }


        inputs.forEach(input => {
            input.addEventListener("focus", addcl);
            input.addEventListener("blur", remcl);
        });
    </script>
@endpush

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.0/css/all.min.css" integrity="sha512-3PN6gfRNZEX4YFyz+sIyTF6pGlQiryJu9NlGhu9LrLMQ7eDjNgudQoFDK3WSNAayeIKc6B8WXXpo4a7HqxjKwg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush