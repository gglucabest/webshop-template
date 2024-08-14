1	<?php
2	// Functie om de inhoud dynamisch te laden op basis van de geselecteerde pagina
3	function loadContent($page) {
4	    switch ($page) {
5	        case 'producten':
6	            return '
7	                <h2>Onze Producten</h2>
8	                <div class="product">
9	                    <img src="img/product1.jpg" alt="Product 1">
10	                    <h3>Product 1</h3>
11	                    <p>Beschrijving van product 1.</p>
12	                    <a href="#" class="button">Koop Nu</a>
13	                </div>
14	                <div class="product">
15	                    <img src="img/product2.jpg" alt="Product 2">
16	                    <h3>Product 2</h3>
17	                    <p>Beschrijving van product 2.</p>
18	                    <a href="#" class="button">Koop Nu</a>
19	                </div>
20	                <div class="product">
21	                    <img src="img/product3.jpg" alt="Product 3">
22	                    <h3>Product 3</h3>
23	                    <p>Beschrijving van product 3.</p>
24	                    <a href="#" class="button">Koop Nu</a>
25	                </div>';
26	        case 'overons':
27	            return '
28	                <h2>Welkom op dit website template!</h2>
29	                <p>Deze pagina komt binnenkort beschikbaar.</p>';
30	        case 'contact':
31	            return '
32	                <h2>Contact</h2>
33	                <p>Neem contact met ons op via <a href="mailto:info@lucadevelopment.nl">info@lucadevelopment.nl</a>.</p>';
34	        default:
35	            return '
36	                <h2>Home</h2>
37	                <p>Welkom bij onze webshop! Ontdek onze producten en meer informatie over onze diensten.</p>';
38	    }
39	}
40	
41	// Verkrijg de pagina die geladen moet worden
42	$page = isset($_GET['page']) ? $_GET['page'] : 'home'; // Standaard naar 'home' als geen pagina is gespecificeerd
43	?>
44	<!DOCTYPE html>
45	<html lang="nl">
46	<head>
47	    <meta charset="UTF-8">
48	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
49	    <title>Webshop</title>
50	    <style>
51	        body {
52	            font-family: Arial, sans-serif;
53	            background-color: #f4f4f4;
54	            color: #333;
55	            margin: 0;
56	            padding: 0;
57	            min-height: 100vh;
58	            display: flex;
59	            flex-direction: column;
60	        }
61	
62	        header {
63	            background-color: #00264d; /* Donkerblauw */
64	            color: white;
65	            padding: 15px 20px;
66	            text-align: center;
67	        }
68	
69	        footer {
70	            background-color: #00264d; /* Donkerblauw */
71	            color: white;
72	            text-align: center;
73	            padding: 20px;
74	            margin-top: auto;
75	            width: 100%;
76	        }
77	
78	        .container {
79	            width: 80%;
80	            margin: auto;
81	            overflow: hidden;
82	            flex-grow: 1;
83	        }
84	
85	        nav {
86	            background-color: #003366; /* Donkerder blauw */
87	            padding: 10px;
88	            text-align: center;
89	        }
90	
91	        nav a {
92	            color: white;
93	            text-decoration: none;
94	            padding: 10px 20px; /* Aanpassing van padding voor knoppen */
95	            display: inline-block;
96	            transition: background-color 0.3s, transform 0.3s;
97	        }
98	
99	        nav a:hover {
100	            background-color: #004080; /* Helderder blauw bij hover */
101	            transform: scale(1.1); /* Kleine vergroting bij hover */
102	        }
103	
104	        .button {
105	            display: inline-block;
106	            color: white;
107	            background-color: #004080;
108	            padding: 10px 20px;
109	            text-decoration: none;
110	            border-radius: 5px;
111	            transition: background-color 0.3s, transform 0.3s;
112	        }
113	
114	        .button:hover {
115	            background-color: #0059b3;
116	            transform: scale(1.05); /* Kleine vergroting bij hover */
117	        }
118	
119	        .product {
120	            background: #fff;
121	            border: 1px solid #ddd;
122	            margin-bottom: 20px;
123	            padding: 15px;
124	            border-radius: 5px;
125	            text-align: center;
126	            transition: box-shadow 0.3s;
127	        }
128	
129	        .product img {
130	            max-width: 100%;
131	            height: auto;
132	        }
133	
134	        .product h3 {
135	            margin: 10px 0;
136	        }
137	
138	        .product p {
139	            color: #666;
140	        }
141	
142	        .product:hover {
143	            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Schaduw bij hover */
144	            transform: translateY(-5px); /* Kleine verhoging bij hover */
145	        }
146	
147	        .widgets {
148	            display: flex;
149	            justify-content: center;
150	            flex-wrap: wrap;
151	            gap: 20px;
152	            margin-top: 20px;
153	        }
154	
155	        .widget {
156	            background-color: #fff;
157	            border: 1px solid #ddd;
158	            border-radius: 5px;
159	            padding: 20px;
160	            width: 100%;
161	            max-width: 300px;
162	            transition: transform 0.3s, box-shadow 0.3s;
163	        }
164	
165	        .widget:hover {
166	            transform: scale(1.05); /* Kleine vergroting bij hover */
167	            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Schaduw bij hover */
168	        }
169	
170	        footer a {
171	            color: white;
172	            text-decoration: none;
173	        }
174	
175	        .footer-hosted {
176	            display: inline-flex;
177	            align-items: center;
178	            gap: 5px;
179	        }
180	
181	        .footer-hosted img {
182	            width: 20px;
183	            height: 20px;
184	        }
185	
186	        /* Preloader CSS */
187	        #preloader {
188	            position: fixed;
189	            top: 0;
190	            left: 0;
191	            width: 100%;
192	            height: 100%;
193	            background: rgba(255, 255, 255, 0.8); /* Semi-transparante achtergrond */
194	            display: flex;
195	            justify-content: center;
196	            align-items: center;
197	            z-index: 9999;
198	        }
199	
200	        #preloader .spinner {
201	            border: 8px solid rgba(0, 0, 0, 0.1); /* Lichtgrijze rand */
202	            border-top: 8px solid #3498db; /* Blauwe rand bovenop */
203	            border-radius: 50%;
204	            width: 60px; /* Grotere spinner */
205	            height: 60px;
206	            animation: spin 1.5s linear infinite; /* Langzamere en soepelere draai-animatie */
207	        }
208	
209	        @keyframes spin {
210	            0% { transform: rotate(0deg); }
211	            100% { transform: rotate(360deg); }
212	        }
213	    </style>
214	</head>
215	<body>
216	
217	<!-- Preloader -->
218	<div id="preloader">
219	    <div class="spinner"></div>
220	</div>
221	
222	<header>
223	    <h1>Welkom bij de Webshop</h1>
224	</header>
225	
226	<nav>
227	    <a href="?page=home">Home</a>
228	    <a href="?page=producten">Producten</a>
229	    <a href="?page=overons">Over Ons</a>
230	    <a href="?page=contact">Contact</a>
231	</nav>
232	
233	<div class="container">
234	    <div class="content">
235	        <?php echo loadContent($page); ?>
236	    </div>
237	
238	    <!-- Flexbox Widgets -->
239	    <div class="widgets">
240	        <!-- Widget 1 -->
241	        <div class="widget">
242	            <h3>Widget 1</h3>
243	            <p>Inhoud van widget 1.</p>
244	        </div>
245	
246	        <!-- Widget 2 -->
247	        <div class="widget">
248	            <h3>Widget 2</h3>
249	            <p>Inhoud van widget 2.</p>
250	        </div>
251	
252	        <!-- Widget 3 -->
253	        <div class="widget">
254	            <h3>Widget 3</h3>
255	            <p>Inhoud van widget 3.</p>
256	        </div>
257	    </div>
258	</div>
259	
260	<footer>
261	    <p>Made and Developed by <a href="https://lucadevelopment.nl" style="color: white; text-decoration: none;">LucaDevelopment.nl</a></p>
262	    <p class="footer-hosted">Hosted 24/7 by <a href="https://luxehost.nl" style="color: white; text-decoration: none;">LuxeHost</a>
263	    <img src="https://cdn.discordapp.com/emojis/1245359970950578236.webp?size=240&quality=lossless" alt="Emoticon"></p>
264	</footer>
265	
266	<!-- JavaScript code for preloader -->
267	<script>
268	    document.addEventListener('DOMContentLoaded', function() {
269	        function simulateHeavyTask() {
270	            return new Promise(resolve => {
271	                setTimeout(() => {
272	                    resolve();
273	                }, 300); // Simuleer een zware taak van 300ms
274	            });
275	        }
276	
277	        async function hidePreloader() {
278	            await simulateHeavyTask(); // Wacht tot de zware taak is voltooid
279	            document.getElementById('preloader').style.display = 'none'; // Verberg de preloader
280	        }
281	
282	        hidePreloader();
283	    });
284	</script>
285	
286	</body>
287	</html>
