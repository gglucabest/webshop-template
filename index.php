1	<?php
2	// Functie om de inhoud dynamisch te laden op basis van de geselecteerde pagina
3	function loadContent($page) {
4	    switch ($page) {
5	        case 'producten':
6	            return '
7	                <h2>Onze Producten</h2>
8	                <div class="product">
9	                    <img src="/img/product1.jpg" alt="Product 1">
10	                    <h3>Product 1</h3>
11	                    <p>Beschrijving van product 1.</p>
12	                    <a href="#" class="button">Koop Nu</a>
13	                </div>
14	                <div class="product">
15	                    <img src="/img/product2.jpg" alt="Product 2">
16	                    <h3>Product 2</h3>
17	                    <p>Beschrijving van product 2.</p>
18	                    <a href="#" class="button">Koop Nu</a>
19	                </div>
20	                <div class="product">
21	                    <img src="/img/product3.jpg" alt="Product 3">
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
42	$page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 'home'; // Standaard naar 'home' als geen pagina is gespecificeerd
43	?>
44	<!DOCTYPE html>
45	<html lang="nl">
46	<head>
47	    <meta charset="UTF-8">
48	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
49	    <title>Webshop</title>
50	    <link rel="stylesheet" href="/css/style.css"> <!-- Extern CSS-bestand -->
51	    <style>
52	        /* Inline CSS indien nodig */
53	        body {
54	            font-family: Arial, sans-serif;
55	            background-color: #f4f4f4;
56	            color: #333;
57	            margin: 0;
58	            padding: 0;
59	            min-height: 100vh;
60	            display: flex;
61	            flex-direction: column;
62	        }
63	
64	        header, footer {
65	            background-color: #00264d; /* Donkerblauw */
66	            color: white;
67	            padding: 15px 20px;
68	            text-align: center;
69	        }
70	
71	        footer {
72	            margin-top: auto;
73	            width: 100%;
74	        }
75	
76	        .container {
77	            width: 80%;
78	            margin: auto;
79	            overflow: hidden;
80	            flex-grow: 1;
81	        }
82	
83	        nav {
84	            background-color: #003366; /* Donkerder blauw */
85	            padding: 10px;
86	            text-align: center;
87	        }
88	
89	        nav a {
90	            color: white;
91	            text-decoration: none;
92	            padding: 10px 20px; /* Aanpassing van padding voor knoppen */
93	            display: inline-block;
94	            transition: background-color 0.3s, transform 0.3s;
95	        }
96	
97	        nav a:hover {
98	            background-color: #004080; /* Helderder blauw bij hover */
99	            transform: scale(1.1); /* Kleine vergroting bij hover */
100	        }
101	
102	        .button {
103	            display: inline-block;
104	            color: white;
105	            background-color: #004080;
106	            padding: 10px 20px;
107	            text-decoration: none;
108	            border-radius: 5px;
109	            transition: background-color 0.3s, transform 0.3s;
110	        }
111	
112	        .button:hover {
113	            background-color: #0059b3;
114	            transform: scale(1.05); /* Kleine vergroting bij hover */
115	        }
116	
117	        .product {
118	            background: #fff;
119	            border: 1px solid #ddd;
120	            margin-bottom: 20px;
121	            padding: 15px;
122	            border-radius: 5px;
123	            text-align: center;
124	            transition: box-shadow 0.3s;
125	        }
126	
127	        .product img {
128	            max-width: 100%;
129	            height: auto;
130	        }
131	
132	        .product h3 {
133	            margin: 10px 0;
134	        }
135	
136	        .product p {
137	            color: #666;
138	        }
139	
140	        .product:hover {
141	            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Schaduw bij hover */
142	            transform: translateY(-5px); /* Kleine verhoging bij hover */
143	        }
144	
145	        .widgets {
146	            display: flex;
147	            justify-content: center;
148	            flex-wrap: wrap;
149	            gap: 20px;
150	            margin-top: 20px;
151	        }
152	
153	        .widget {
154	            background-color: #fff;
155	            border: 1px solid #ddd;
156	            border-radius: 5px;
157	            padding: 20px;
158	            width: 100%;
159	            max-width: 300px;
160	            transition: transform 0.3s, box-shadow 0.3s;
161	        }
162	
163	        .widget:hover {
164	            transform: scale(1.05); /* Kleine vergroting bij hover */
165	            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Schaduw bij hover */
166	        }
167	
168	        footer a {
169	            color: white;
170	            text-decoration: none;
171	        }
172	
173	        .footer-hosted {
174	            display: inline-flex;
175	            align-items: center;
176	            gap: 5px;
177	        }
178	
179	        .footer-hosted img {
180	            width: 20px;
181	            height: 20px;
182	        }
183	
184	        /* Preloader CSS */
185	        #preloader {
186	            position: fixed;
187	            top: 0;
188	            left: 0;
189	            width: 100%;
190	            height: 100%;
191	            background: rgba(255, 255, 255, 0.8); /* Semi-transparante achtergrond */
192	            display: flex;
193	            justify-content: center;
194	            align-items: center;
195	            z-index: 9999;
196	        }
197	
198	        #preloader .spinner {
199	            border: 8px solid rgba(0, 0, 0, 0.1); /* Lichtgrijze rand */
200	            border-top: 8px solid #3498db; /* Blauwe rand bovenop */
201	            border-radius: 50%;
202	            width: 60px; /* Grotere spinner */
203	            height: 60px;
204	            animation: spin 1.5s linear infinite; /* Langzamere en soepelere draai-animatie */
205	        }
206	
207	        @keyframes spin {
208	            0% { transform: rotate(0deg); }
209	            100% { transform: rotate(360deg); }
210	        }
211	    </style>
212	</head>
213	<body>
214	
215	<!-- Preloader -->
216	<div id="preloader">
217	    <div class="spinner"></div>
218	</div>
219	
220	<header>
221	    <h1>Welkom bij de Webshop</h1>
222	</header>
223	
224	<nav>
225	    <a href="?page=home">Home</a>
226	    <a href="?page=producten">Producten</a>
227	    <a href="?page=overons">Over Ons</a>
228	    <a href="?page=contact">Contact</a>
229	</nav>
230	
231	<div class="container">
232	    <div class="content">
233	        <?php echo loadContent($page); ?>
234	    </div>
235	
236	    <!-- Flexbox Widgets -->
237	    <div class="widgets">
238	        <!-- Widget 1 -->
239	        <div class="widget">
240	            <h3>Widget 1</h3>
241	            <p>Inhoud van widget 1.</p>
242	        </div>
243	
244	        <!-- Widget 2 -->
245	        <div class="widget">
246	            <h3>Widget 2</h3>
247	            <p>Inhoud van widget 2.</p>
248	        </div>
249	
250	        <!-- Widget 3 -->
251	        <div class="widget">
252	            <h3>Widget 3</h3>
253	            <p>Inhoud van widget 3.</p>
254	        </div>
255	    </div>
256	</div>
257	
258	<footer>
259	    <p>Made and Developed by <a href="https://lucadevelopment.nl" style="color: white; text-decoration: none;">LucaDevelopment.nl</a></p>
260	    <p class="footer-hosted">Hosted 24/7 by <a href="https://luxehost.nl" style="color: white; text-decoration: none;">LuxeHost</a>
261	    <img src="https://cdn.discordapp.com/emojis/1245359970950578236.webp?size=240&quality=lossless" alt="Emoticon"></p>
262	</footer>
263	
264	<!-- JavaScript code for preloader -->
265	<script>
266	    document.addEventListener('DOMContentLoaded', function() {
267	        function simulateHeavyTask() {
268	            return new Promise(resolve => {
269	                setTimeout(() => {
270	                    resolve();
271	                }, 300); // Simuleer een zware taak van 300ms
272	            });
273	        }
274	
275	        async function hidePreloader() {
276	            await simulateHeavyTask(); // Wacht tot de zware taak is voltooid
277	            document.getElementById('preloader').style.display = 'none'; // Verberg de preloader
278	        }
279	
280	        hidePreloader();
281	    });
282	</script>
283	
284	</body>
285	</html>
286	
Copy
