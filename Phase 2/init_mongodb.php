<?php 


require "../vendor/autoload.php" ; 

$client = new MongoDB\Client ;
$faculty_details = $client->leave_portal_db->faculty_details ;

$insert_all_faculty = $faculty_details->insertMany([


    ['faculty_id' => 'CS1',
    'name' => 'Nitin Auluck',
    'designation' => 'HOD',
    'department' => 'CSE',
    'email' => 'hodcse@iitrpr.ac.in',
    'bio' => 'Dr. Auluck is the Head of Computer Science and Engineering Department at IIT Ropar. His research interests include Scheduling, Parallel and Distributed Computing.',
    'awards' => [['name' => 'Second Best Paper',
                'awarded_by' => 'The IEEE International Conference on Parallel, Distributed & Grid Computing, Shimla.',
                'year' => '2016']],
    'publications' => [['title' => 'Energy Aware Scheduling on Heterogeneous Multiprocessors with DVFS & Duplication.',
                'year' => '2016',
                'conference' => 'The 17th IEEE International Conference on Parallel & Distributed Computing, Applications & Technologies, Guangzhou, China.',
                'collaborators' => 'J. Singh, A. Gujral, H. Singh, J. Singh, N. Auluck'],
                ['title' => 'A Multiobjective Genetic Algorithm to Improve Power and Performance of Heterogeneous Multiprocessors.',
                'year' => '2016',
                'conference' => 'The IEEE International Conference on Parallel, Distributed & Grid Computing, Shimla.',
                'collaborators' => 'J. Singh, M. Pandey, E. Katiyar, R. Tulasyan, V. Gupta, N. Auluck']],
    'courses_taught' => [['course_code' => 'CS 626',
                'course_name' => 'Scheduling in Parallel and Distributed Systems'],
                ['course_code' => 'CSL 604',
                'course_name' => 'Advanced Operating Systems']],
    'grants' => [],
    'education' => [['degree' => 'Ph.D.',
            'department' => 'Computer Science & Engineering',
                'university' => 'University of Cincinnati, USA',
                'year_of_grad' => '2005'],
                ['degree' => 'B.E.',
            'department' => 'Electrical & Electronics Engineering',
                'university' => 'P.D.A. College of Engineering, India',
                'year_of_grad' => '1998']],
    'research_keywords' => ['Scheduling & Resource Allocation', 'Parallel & Distributed Computing']],


    ['faculty_id' => 'CS2',
    'name' => 'Viswanath Gunturi',
    'designation' => 'Fac',
    'department' => 'CSE',
    'email' => 'gunturi@iitrpr.ac.in',
    'bio' => 'Dr. Gunturi is an Assistant Professor at the Computer Science and Engineering Department of IIT Ropar. His research interests include Spatial and Spatio-temporal databases, Sptial data mining, Graph algorithms, Geographic Information Sciences, Transportation.',
    'awards' => [['name' => 'Early Career Research Award',
                'awarded_by' => 'Science and Engineering Research Board, Govt. of India',
                'year' => '2018'], 
                ['name' => 'Teaching excellence award',
                'awarded_by' => 'IIIT Delhi',
                'year' => '2017']],
    'publications' => [['title' => 'A Multi-threaded Algorithm for Capacity Constrained Assignment over Road Networks.',
                'year' => '2020',
                'conference' => '20th Intl. Conf. on Algorithms and Architectures for Parallel Processing, ICA3PP 2020.',
                'collaborators' => 'Mishra, A., Gunturi, V., Ramnath, S.'],
                ['title' => 'A Hierarchical Classifier for Detecting Metro-Journey Activities in Data Sampled at Low Frequency.',
                'year' => '2019',
                'conference' => '17th Intl. Conf. on Advances in Mobile Computing & Multimedia, MoMM 2019.',
                'collaborators' => 'Dewan, A., Gunturi, V.']],
    'courses_taught' => [['course_code' => 'CSL 520',
                'course_name' => 'Database System Implementation'],
                ['course_code' => 'CS 301',
                'course_name' => 'Dababase Managment Systems']],
    'grants' => [['name' => 'Microsoft Azure Credits Grant',
                'sponsor' => 'Microsoft',
                'year' => '2016']],
    'education' => [['degree' => 'Ph.D.',
            'department' => 'Computer Science & Engineering',
                'university' => 'University of Minnesota, USA',
                'year_of_grad' => '2015'],
            ['degree' => 'M.Tech.',
            'department' => 'Computer Science & Engineering',
                'university' => 'Indian Institute of Technology Kanpur, India',
                'year_of_grad' => '2010'],
                ['degree' => 'B.Tech.',
            'department' => 'Electrical & Electronics Engineering',
                'university' => 'Vellore Institute of Technology, India',
                'year_of_grad' => '2008']],
    'research_keywords' => ['Spatio-temporal databases', 'Spatial data mining', 'Graph Algorithms']],


    ['faculty_id' => 'EE1',
    'name' => 'Ravibabu M',
    'designation' => 'HOD',
    'department' => 'EE',
    'email' => 'hodee@iitrpr.ac.in',
    'bio' => 'Dr. Ravibabu is the Head of Electrical Engineering Department at IIT Ropar. His research interests include thermal, acoustical and optical methods for non-invasive/non-destructive imaging technologies. He serves as editorial or advisory boards of the several refereed journals of Institute of Physics, Institute of Electrical and Electronics Engineers (IEEE), Institution of Engineering and Technology (IET), Elsevier etc and also to several peer reviewed conferences.',
    'awards' => [['name' => 'Institute Level Best Project (Postgraduate Level) Award for Open House-I2 Tech',
                'awarded_by' => 'Indian Institute of Technology Delhi, India',
                'year' => '2006'], 
                ['name' => 'Expert member for Senior Scientific/Technical Officers Selection Committee',
                'awarded_by' => 'Department of Atomic Energy, Govt. of India',
                'year' => '2012']],
    'publications' => [['title' => 'Theory of frequency modulated thermal wave imaging for nondestructive subsurface defect detection.',
                'year' => '2006',
                'conference' => 'Applied Physics Letters, American Institute of Physics.',
                'collaborators' => 'Mulaveesala, R., Tuli, S.'],
                ['title' => 'Pulse compression approach to infrared nondestructive characterization.',
                'year' => '2008',
                'conference' => 'Review of Scientifuc Instruments, American Institute of Physics.',
                'collaborators' => 'Mulaveesala, R., Tuli, S.']],
    'courses_taught' => [['course_code' => 'EE 207',
                'course_name' => 'Power Systems'],
                ['course_code' => 'GE 104',
                'course_name' => 'Introduction to Electrical Engineering']],
    'grants' => [['name' => 'Matched filter approach for chirp excited infrared imaging for non-destructive characterization.',
                'sponsor' => 'Science & Engineering Research Board (SERB)',
                'year' => '2014-2017'],
        ['name' => 'Non-destructive testing of Carbon Fibre Reinforced Polymers (CFRP) using non-stationary thermal Imaging technique.',
                'sponsor' => 'Ministry of Defense (AR&DB)',
                'year' => '2014-2017']],
    'education' => [['degree' => 'Ph.D.',
            'department' => 'Electrical Engineering',
                'university' => 'Indian Institute of Technology Delhi, India',
                'year_of_grad' => '2007'],
            ['degree' => 'M.Tech.',
            'department' => 'Electrical Engineering',
                'university' => 'National Institute of Technology Trichurapalli, India',
                'year_of_grad' => '2000']],
    'research_keywords' => ['Sensing and Imaging for Industrial Quality Control', 'Infrared Imaging']],


    ['faculty_id' => 'EE2',
    'name' => 'Rohit Sharma',
    'designation' => 'Fac',
    'department' => 'EE',
    'email' => 'rohit@iitrpr.ac.in',
    'bio' => 'Dr. Sharma is an Associate Professor at the Electrical Engineering Department of IIT Ropar. All along his tenure at IIT Ropar, he has initiated activities in the area of VLSI Design and Nanoelectronics. He has established the VLSI Design Lab for undergraduate studies and the Nanoelectronics Research Lab for graduate studies. His research interests include Design of high-speed chip-chip and 3D interconnects, Graphene based nanoelectronic circuits and interconnects, Communication schemes for multi-core architecture and 3D IC design. Before joining IIT Ropar, Dr. Sharma was a post-doctoral fellow at the Interconnect Focus Center, Georgia Tech., Atlanta.',
    'awards' => [['name' => 'Institute Gold Medal',
                'awarded_by' => 'Dayalbagh Educational Institute',
                'year' => '2010']], 
    'publications' => [['title' => 'First-Principle Analysis of Transition Metal Edge-Passivated Armchair Graphene Nanoribbons for Nanoscale Interconnects.',
                'year' => '2020',
                'conference' => 'IEEE Transactions on Nanotechnology.',
                'collaborators' => 'Vipul Kumar Nishad, Atul Kumar Nishad, Brajesh Kumar Kaushik, Rohit Sharma'],
                ['title' => 'A Temperature and Dielectric Roughness-aware Matrix Rational Approximation (MRA) Model for the Reliability Assessment of Copper-Graphene Hybrid On-Chip Interconnects.',
                'year' => '2020',
                'conference' => 'IEEE Transactions on Components, Packaging and Manufacturing Technology',
                'collaborators' => 'Rahul Kumar, Amit Kumar, Surila Guglani, Somesh Kumar, Sourajeet Roy, Brajesh Kumar Kaushik, Rohit Sharma, Ramachandra Achar']],
    'courses_taught' => [['course_code' => 'EEL 206',
                'course_name' => 'Digital ELectronic Circuits'],
                ['course_code' => 'GEL 614',
                'course_name' => 'Digital IC Design']],
    'grants' => [['name' => 'Design and Optimization of an Ultra Low-loss Interconnect Link on Silicon Interposer',
                'sponsor' => 'DST',
                'year' => '2013-2016'],
        ['name' => 'Design Verification and Analysis of Electronic Impact cum Time Delay Sensing Module (EITDS) Circuit',
                'sponsor' => 'DRDO',
                'year' => '2014-2015']],
    'education' => [['degree' => 'Ph.D.',
            'department' => 'Electronics and Communication Engineering',
                'university' => 'Jaypee University of Information Technology, India',
                'year_of_grad' => '2009'],
            ['degree' => 'M.Tech.',
            'department' => 'Engineering Systems',
                'university' => 'Dayalbagh Educational Institute',
                'year_of_grad' => '2003'],
            ['degree' => 'B.E.',
            'department' => 'Electronics and Telecommunication Engineering',
                'university' => 'North Maharashtra University, India',
                'year_of_grad' => '2000']],
    'research_keywords' => ['Graphene based nanoelectronic devices', 'Application of Machine Learning in advance packaging and systems']],



    ['faculty_id' => 'ME1',
    'name' => 'Ekta Singla',
    'designation' => 'HOD',
    'department' => 'ME',
    'email' => 'hodme@iitrpr.ac.in',
    'bio' => 'Dr. Ekta is serving as Associate Professor and Head of the Mechanical Engineering Department at IIT Ropar. With her research interests in Modular Robotics, Service robots, Customized optimal designs, Evolutionary robotics and hybrid morphologies, she has an experience of more than fifteen years in Robotics and in applied Optimization fields. She is a recipient of Institute Gold medal during her Masters program, National doctoral fellowship during her doctoral program at IIT Kanpur, CNRS postdoctoral fellowship for UPMC Paris and a recent National award from Institute of Engineers.' ,
    'awards' => [['name' => 'Institute Gold Medal',
                'awarded_by' => 'IIT Kanpur',
                'year' => '2010'],
        ['name' => 'Smt Sheela Baya National Award',
                'awarded_by' => 'Institute of Engineers',
                'year' => '2016']], 
    'publications' => [['title' => 'Kinematic modeling of a 7-degree of freedom spatial hybrid manipulator for medical surgery',
                'year' => '2017',
                'conference' => 'IMechE, Part H: Journal of Engineering in Medicine',
                'collaborators' => 'Singh, A., Singla, E., Soni, S., Singla, A'],
                ['title' => 'Towards motor-selection criteria for n-dof serial robotic manipulators: an optimal approach',
                'year' => '2017',
                'conference' => '33rd National Convention of Mechanical Engineers, Institute of Engineers, Udaipur, India',
                'collaborators' => 'E. Singla, S. Singh, A. Singla']],
    'courses_taught' => [['course_code' => 'ME 203',
                'course_name' => 'Theory of Machines'],
                ['course_code' => 'ME 506',
                'course_name' => 'Machine Element Design']],
    'grants' => [['name' => 'A-PATH: Affordable preventative and assistive technology for healthcare',
                'sponsor' => 'DST-GITA',
                'year' => '2017-2019'],
        ['name' => 'Optimal design and analysis of modular manipulator for constrained Environments.',
                'sponsor' => 'DST-SERB',
                'year' => '2013-2016']],
    'education' => [['degree' => 'Ph.D.',
            'department' => 'Robotics',
                'university' => 'Indian Institute of Technology Kanpur, India',
                'year_of_grad' => '2009'],
            ['degree' => 'M.Tech.',
            'department' => 'CAD/CAM and Robotics',
                'university' => 'Thapar University, Punjab, India',
                'year_of_grad' => '2002'],
            ['degree' => 'B.Tech.',
            'department' => 'Mechanical Engineering',
                'university' => ' GZS CET Bathinda, Punjab, India',
                'year_of_grad' => '2000']],
    'research_keywords' => ['Modular reconfigurable robots', 'Customized robot design']],


    ['faculty_id' => 'ME2',
    'name' => 'Harpreet Singh',
    'designation' => 'Fac',
    'department' => 'ME',
    'email' => 'harpeet@iitrpr.ac.in',
    'bio' => 'Prof. Harpreet is a Professor at the Mechanical Engineering Department of IIT Ropar. His research interests include Surface Engineering-Degradation of Materials, High Temperature Corrosion and its Prevention, Slurry Erosion of Hydraulic Turbines and its Control.',
    'awards' => [['name' => 'Achievers Award',
                'awarded_by' => 'Government of Punjab',
                'year' => '2019'],
        ['name' => 'Kansai Nerolac Excellence Award for the Excellence in Coating Research',
                'awarded_by' => 'Society for Surface Protective Coatings, India',
                'year' => '2013']], 
    'publications' => [['title' => 'Development of Corrosion Resistant Surfaces via Friction Stir Processing for Bio Implant Applications',
                'year' => '2018',
                'conference' => 'IOP Conference Series: Materials Science and Engineering',
                'collaborators' => 'Sodhi, G.P.S., Singh, H.'],
                ['title' => 'Characterization and Comparison of Copper Coatings developed by Low Pressure Cold Spraying and Laser Cladding Techniques',
                'year' => '2017',
                'conference' => 'International Conference on Nano-technology :Ideas, Innovations and Initiatives, IIT Roorkee, India',
                'collaborators' => 'Singh, S., Singh, P., Singh, H']],
    'courses_taught' => [['course_code' => 'ME 305',
                'course_name' => 'Manufacturing Technology'],
                ['course_code' => 'ME 526',
                'course_name' => 'Tribology']],
    'grants' => [['name' => 'Erosion, Corrosion and Deposition Resistant Coatings for Coal-Fired Boilers',
                'sponsor' => 'IMPRINT, MHRD',
                'year' => '2017-2020'],
        ['name' => 'Development of Cold-Spraying Based Additive Manufacturing Process for Industrial Application',
                'sponsor' => 'MHRD-DST',
                'year' => '2016-2020']],
    'education' => [['degree' => 'Ph.D.',
            'department' => 'Mechanical Engineering',
                'university' => 'Indian Institute of Technology Roorkee, India',
                'year_of_grad' => '2005'],
            ['degree' => 'M.E.',
            'department' => 'Mechanical Engineering',
                'university' => 'GND Engineering College, Ludhiana, Punjab, Indiaa',
                'year_of_grad' => '1999'],
            ['degree' => 'B.E.',
            'department' => 'Mechanical Engineering',
                'university' => ' GZS CET Bathinda, Punjab, India',
                'year_of_grad' => '1994']],
    'research_keywords' => ['Biomedical Coatings', 'Additive Manufacturing']],

    ['faculty_id' => 'DE1',
    'name' => 'Ramesh Garg',
    'designation' => 'DEANFA',
    'department' => 'CRO',
    'email' => 'deanfa@iitrpr.ac.in',
    'bio' => 'Prof. Ramesh Garg is serving as the Dean of Faculty Affairs and Administration at IIT Ropar.',
    'awards' => [['name' => 'Institute Level Best Project (Postgraduate Level) Award for Open House-I2 Tech',
                'awarded_by' => 'Indian Institute of Technology Delhi, India',
                'year' => '2006'], 
                ['name' => 'Expert member for Senior Scientific/Technical Officers Selection Committee',
                'awarded_by' => 'Department of Atomic Energy, Govt. of India',
                'year' => '2012']],
    'publications' => [['title' => 'Theory of frequency modulated thermal wave imaging for nondestructive subsurface defect detection.',
                'year' => '2006',
                'conference' => 'Applied Physics Letters, AMerican Institute of Physics.',
                'collaborators' => 'Mulaveesala, R., Tuli, S.'],
                ['title' => 'Pulse compression approach to infrared nondestructive characterization.',
                'year' => '2008',
                'conference' => 'Review of Scientifuc Instruments, American Institute of Physics.',
                'collaborators' => 'Mulaveesala, R., Tuli, S.']],
    'courses_taught' => [['course_code' => 'EE 207',
                'course_name' => 'Power Systems'],
                ['course_code' => 'GE 104',
                'course_name' => 'Introduction to Electrical Engineering']],
    'grants' => [['name' => 'Matched filter approach for chirp excited infrared imaging for non-destructive characterization.',
                'sponsor' => 'Science & Engineering Research Board (SERB)',
                'year' => '2014-2017'],
        ['name' => 'Non-destructive testing of Carbon Fibre Reinforced Polymers (CFRP) using non-stationary thermal Imaging technique.',
                'sponsor' => 'Ministry of Defense (AR&DB)',
                'year' => '2014-2017']],
    'education' => [['degree' => 'Ph.D.',
            'department' => 'Electrical Engineering',
                'university' => 'Indian Institute of Technology Delhi, India',
                'year_of_grad' => '2007'],
            ['degree' => 'M.Tech.',
            'department' => 'Electrical Engineering',
                'university' => 'National Institute of Technology Trichurapalli, India',
                'year_of_grad' => '2000']],
    'research_keywords' => ['Sensing and Imaging for Industrial Quality Control', 'Infrared Imaging']],


    ['faculty_id' => 'DE2',
    'name' => 'RP Chhabra',
    'designation' => 'DEANAA',
    'department' => 'CRO',
    'email' => 'deanar@iitrpr.ac.in',
    'bio' => 'Prof. Chhabra is serving as the Dean of Academic Affairs at IIT Ropar. His research interests include Hydrodynamics of non-Newtonian fluid-particle systems including bubbles, drops, particles and fluidization, Multiphase (Gas/Liquid) flow in pipes and in packed beds, Interaction between nonlinear properties of fluids and shapes of particles.',
    'awards' => [['name' => 'Institute Level Best Project (Postgraduate Level) Award for Open House-I2 Tech',
                'awarded_by' => 'Indian Institute of Technology Delhi, India',
                'year' => '2006'], 
                ['name' => 'Expert member for Senior Scientific/Technical Officers Selection Committee',
                'awarded_by' => 'Department of Atomic Energy, Govt. of India',
                'year' => '2012']],
    'publications' => [['title' => 'Laminar forced convection in power-law fluids from two heated cylinders in a square duct',
                'year' => '2017',
                'conference' => 'International Heat and Mass Transfer',
                'collaborators' => 'L. Mishra, A.K. Baranwal, R.P. Chhabra'],
                ['title' => 'Effect of yield stress on free convection from an isothermal cylinder adjacent to an adiabatic wall',
                'year' => '2017',
                'conference' => 'Computational Thermal Science',
                'collaborators' => 'A.K. Baranwal, R.P. Chhabra']],
    'courses_taught' => [['course_code' => 'CH 101',
                'course_name' => 'Introduction to Chemical Engineering'],
                ['course_code' => 'CH 204',
                'course_name' => 'Thermodynamic Processes']],
    'grants' => [['name' => 'Erosion, Corrosion and Deposition Resistant Coatings for Coal-Fired Boilers',
                'sponsor' => 'IMPRINT, MHRD',
                'year' => '2017-2020'],
        ['name' => 'Development of Cold-Spraying Based Additive Manufacturing Process for Industrial Application',
                'sponsor' => 'MHRD-DST',
                'year' => '2016-2020']],
    'education' => [['degree' => 'Ph.D.',
            'department' => 'Chemical Engineering',
                'university' => 'Monash University, Australia',
                'year_of_grad' => '1980'],
            ['degree' => 'M.E.',
            'department' => 'Chemical Engineering',
                'university' => 'Indian Institute of Science, Bangalore, India',
                'year_of_grad' => '1976'],
            ['degree' => 'B.E.',
            'department' => 'Chemical Engineering',
                'university' => 'University of Roorkee India',
                'year_of_grad' => '1974']],
    'research_keywords' => ['Hydrodynamics of non-Newtonian fluid-particle systems', 'Modelling of non-Newtonian fluid flow in fibrous media']],


    ['faculty_id' => 'DE3',
    'name' => 'CC Reddy',
    'designation' => 'DEANSA',
    'department' => 'CRO',
    'email' => 'deansa@iitrpr.ac.in',
    'bio' => 'Dr. Reddy is serving as the Associate Dean of Student Affairs at IIT Ropar. He has contributed to the design of worlds first nanocomposite HVDC power cable during this time (250 kV, between Hokkaido and Honshu). He is an Associate Editor of IEEE Transactions on Dielectrics and Electrical Insulation. He is a member of the Bureau of Indian Standards committee on Dielectrics, member of the Board of Studies of several universities in India. Dr. Reddy had participated in academic-industry collaborative research in Japan with several universities.',
    'awards' => [['name' => 'MHRD Scholarship',
                'awarded_by' => 'Govt. of India',
                'year' => '2000']],
    'publications' => [['title' => 'Polymer nanocomposites asinsulation for hv dc cables - investigations on the thermalbreakdown',
                'year' => '2008',
                'conference' => 'IEEE Transactions on Dielectrics and Electrical Insulation',
                'collaborators' => 'C. C. Reddy, T. S. Ramu'],
                ['title' => 'Theoretical maximum limits on power-handlingcapacity of hvdc cables',
                'year' => '2009',
                'conference' => 'IEEE Transactions on Power Delivery',
                'collaborators' => 'C. C. Reddy, T. S. Ramu']],
    'courses_taught' => [['course_code' => 'EE 207',
                'course_name' => 'Engineering Electromagnetics'],
                ['course_code' => 'EE 314',
                'course_name' => 'Topics in High Voltage Engineering']],
    'grants' => [['name' => 'Visvesvaraya PhD Scheme',
                'sponsor' => 'DEITY',
                'year' => '2015-2020'],
        ['name' => 'Investigation on failure of transition cable joints in Bombay',
                'sponsor' => 'Adani Electricity, Mumbai',
                'year' => '2020-2021']],
    'education' => [['degree' => 'Ph.D.',
            'department' => 'Electrical Engineering',
                'university' => 'Indian Institute of Science, Bangalore, India',
                'year_of_grad' => '1997'],
            ['degree' => 'M.E.',
            'department' => 'Electrical Engineering',
                'university' => 'Indian Institute of Science, Bangalore, India',
                'year_of_grad' => '1993'],
            ['degree' => 'B.E.',
            'department' => 'Electrical Engineering',
                'university' => 'University College of Engineering, Hyderabad, India',
                'year_of_grad' => '1991']],
    'research_keywords' => ['Electric Power Cable Technology', 'Power electronics', 'Signal processing in HV Engineering']], 

    ['faculty_id' => 'DR1',
    'name' => 'Rajeev Ahuja',
    'designation' => 'DIR',
    'department' => 'CRO',
    'email' => 'director@iitrpr.ac.in',
    'bio' => 'Dr. Reddy is serving as the Director of IIT Ropar. Previously, he was an Associate Professor at Uppsala University.',
    'awards' => [['name' => 'Wallmarkska prize',
                'awarded_by' => 'Royal Swedish Academy of Sciences, Stockholm',
                'year' => '2011'],
        ['name' => 'Senior Research Fellowship award',
                'awarded_by' => 'CSIR, India',
                'year' => '1990']],
    'publications' => [['title' => 'Formation and electronic properties of palladium hydrides and palladium-rhodium dihydride alloys under pressure',
                'year' => '2017',
                'conference' => 'Nature - Scientific Reports',
                'collaborators' => 'X. Yang, H. Li, R. Ahuja, T.W Kang, W. Luo'],
                ['title' => 'Effect of transition metal cations on stability enhancement for molybdate based hybrid supercapacitor',
                'year' => '2017',
                'conference' => 'ACS Applied Materials & Interfaces',
                'collaborators' => 'T. Watcharatharapong, M. Minakshi Sundaram, S. Chakraborty, D. Li, G.M. Shafiullah, R.D. Aughterson, R. Ahuja']],
    'courses_taught' => [['course_code' => 'PH 101',
                'course_name' => 'Engineering Physics'],
                ['course_code' => 'PH 512',
                'course_name' => 'Nanophysics']],
    'grants' => [['name' => 'Visvesvaraya PhD Scheme',
                'sponsor' => 'DEITY',
                'year' => '2015-2020'],
        ['name' => 'Investigation on failure of transition cable joints in Bombay',
                'sponsor' => 'Adani Electricity, Mumbai',
                'year' => '2020-2021']],
    'education' => [['degree' => 'Ph.D.',
            'department' => 'Physics',
                'university' => 'Uppsala University',
                'year_of_grad' => '1997'],
            ['degree' => 'M.E.',
            'department' => 'Solid State Physics',
                'university' => 'Indian Institute of Science, Bangalore, India',
                'year_of_grad' => '1993']],
    'research_keywords' => ['Solar Cell', 'Organic Batteries']], 



]);


 ?>